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

namespace spec\BenGorFile\GaufretteFilesystemBridge\Infrastructure\Domain\Model;

use BenGorFile\File\Domain\Model\FileName;
use BenGorFile\File\Domain\Model\Filesystem;
use BenGorFile\GaufretteFilesystemBridge\Infrastructure\Domain\Model\GaufretteFilesystem;
use Gaufrette\Filesystem as Gaufrette;
use PhpSpec\ObjectBehavior;

/**
 * Spec file of GaufretteFilesystem class.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 */
class GaufretteFilesystemSpec extends ObjectBehavior
{
    function let(Gaufrette $filesystem)
    {
        $this->beConstructedWith($filesystem);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(GaufretteFilesystem::class);
    }

    function it_implements_filesystem()
    {
        $this->shouldImplement(Filesystem::class);
    }

    function it_deletes()
    {
        $this->delete(new FileName('file-name.png'));
    }

    function it_has()
    {
        $this->has(new FileName('file-name.png'));
    }

    function it_overwrites()
    {
        $this->overwrite(new FileName('file-name.png'), 'the content of png');
    }

    function it_reads()
    {
        $this->read(new FileName('file-name.png'));
    }

    function it_renames()
    {
        $this->rename(new FileName('file-old-name.png'), new FileName('file-new-name.png'));
    }

    function it_writes()
    {
        $this->write(new FileName('file-name.png'), 'the content of png');
    }
}
