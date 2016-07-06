<?php

/*
 * This file is part of the BenGorFile package.
 *
 * (c) Beñat Espiña <benatespina@gmail.com>
 * (c) Gorka Laucirica <gorka.lauzirika@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BenGorFile\GaufretteFilesystemBridge\Infrastructure\Domain\Model;

use BenGorFile\File\Domain\Model\FileName;
use BenGorFile\File\Domain\Model\Filesystem;
use Gaufrette\Filesystem as Gaufrette;

/**
 * Gaufrette implementation of filesystem domain class.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 */
class GaufretteFilesystem implements Filesystem
{
    /**
     * The Gaufrette filesystem.
     *
     * @var Gaufrette
     */
    private $filesystem;

    /**
     * Constructor.
     *
     * @param Gaufrette $aFilesystem The Gaufrette filesystem
     */
    public function __construct(Gaufrette $aFilesystem)
    {
        $this->filesystem = $aFilesystem;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(FileName $aName)
    {
        $this->filesystem->delete($aName->filename());
    }

    /**
     * {@inheritdoc}
     */
    public function has(FileName $aName)
    {
        return $this->filesystem->has($aName->filename());
    }

    /**
     * {@inheritdoc}
     */
    public function overwrite(FileName $aName, $aContent)
    {
        $this->filesystem->write($aName->filename(), $aContent, true);
    }

    /**
     * {@inheritdoc}
     */
    public function read(FileName $aName)
    {
        return $this->filesystem->read($aName->filename());
    }

    /**
     * {@inheritdoc}
     */
    public function rename(FileName $anOldName, FileName $aNewName)
    {
        $this->filesystem->rename($anOldName->filename(), $aNewName->filename());
    }

    /**
     * {@inheritdoc}
     */
    public function write(FileName $aName, $aContent)
    {
        $this->filesystem->write($aName->filename(), $aContent);
    }
}
