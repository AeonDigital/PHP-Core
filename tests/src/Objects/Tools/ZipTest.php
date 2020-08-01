<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Tools\Zip as Zip;

require_once __DIR__ . "/../../../phpunit.php";







class ZipTest extends TestCase
{





    public static function tearDownAfterClass()
    {
        $ds = DIRECTORY_SEPARATOR;
        $testDir = realpath(__DIR__ ) . $ds;

        $deleteDirs = [
            $testDir . "files_unpacked",
            $testDir . "files_unpacked_1",
            $testDir . "files_unpacked_2",
            $testDir . "unpack_targets",
            $testDir . "files" . $ds . "dirinside",
        ];

        foreach($deleteDirs as $k => $v) {
            if (file_exists($v)) {
                dir_deltree($v);
            }
        }

        if (file_exists($testDir . "files.zip")) {
            unlink($testDir . "files.zip");
        }
    }





    public function test_method_pack_and_unpack()
    {
        $ds = DIRECTORY_SEPARATOR;


        // Falha por nome errado do diretório
        $ds = DIRECTORY_SEPARATOR;
        $testDir = realpath(__DIR__ . $ds . "filess") . $ds;
        if (file_exists($testDir)) {
            $r = Zip::pack($testDir);
            $this->assertFalse($r);
        }



        $testDir = realpath(__DIR__ . $ds . "files") . $ds;
        $finalFileName = realpath(__DIR__) . $ds . "files.zip";
        $extractedDirs = [
            realpath(__DIR__) . $ds . "files_unpacked",
            realpath(__DIR__) . $ds . "files_unpacked_1",
            realpath(__DIR__) . $ds . "files_unpacked_2"
        ];


        if (file_exists($finalFileName)) {
            unlink($finalFileName);
        }

        foreach ($extractedDirs as $tgt) {
            if (file_exists($tgt)) {
                dir_deltree($tgt);
            }
        }


        if (file_exists($testDir)) {
            $r = Zip::pack($testDir);
            $this->assertTrue($r);
            $this->assertTrue(file_exists($finalFileName));


            $r = Zip::unpack($finalFileName);
            $this->assertTrue($r);

            $r = Zip::unpack($finalFileName);
            $this->assertTrue($r);

            $r = Zip::unpack($finalFileName);
            $this->assertTrue($r);

            foreach ($extractedDirs as $tgt) {
                $this->assertTrue(file_exists($tgt));
            }
        }
    }



    public function test_method_packTargets()
    {
        // Zipa um arquivo e um diretório
        $ds = DIRECTORY_SEPARATOR;
        $testDir = realpath(__DIR__ . $ds . "files") . $ds;
        $testFile = [
            $testDir . "original-image.jpg",
            $testDir . "original-image.png",
            $testDir . "dirinside"
        ];
        $testFileZip = $testDir . "original-image.zip";

        $dirInsideDir = $testDir . "dirinside" . $ds;
        if (!file_exists($dirInsideDir)) {
            mkdir($dirInsideDir, 700);
            copy($testDir . "original-image.jpg", $dirInsideDir. "original-image.jpg");
            copy($testDir . "original-image.png", $dirInsideDir. "original-image.png");
        }

        $r = Zip::packTargets($testFile, $testFileZip);
        $this->assertTrue($r);
        $this->assertTrue(file_exists($testFileZip));
        unlink($testFileZip);
    }



    public function test_method_unpackTargets_fail()
    {
        $ds = DIRECTORY_SEPARATOR;
        $testDir = realpath(__DIR__ . $ds . "files") . $ds;
        $finalFileName = realpath(__DIR__) . $ds . "files.zip";
        $unpackedDir = realpath(__DIR__) . $ds . "unpack_targets";
        $unpackedTempDir = realpath(__DIR__) . $ds . "files_temp";
        $unpackFiles = [
            "original-image-fake.jpg" => $unpackedDir . $ds . "image.jpg",
            "original-image-fake.gif" => $unpackedDir . $ds . "image.gif",
            "original-image-fake.png" => $unpackedDir . $ds . "image.png"
        ];


        if (file_exists($finalFileName)) {
            unlink($finalFileName);
        }

        if (file_exists($unpackedTempDir)) {
            dir_deltree($unpackedTempDir);
        }

        if (file_exists($unpackedDir)) {
            dir_deltree($unpackedDir);
        }


        if (file_exists($testDir)) {
            $r = Zip::pack($testDir);
            $this->assertTrue($r);
            $this->assertTrue(file_exists($finalFileName));


            try {
                $r = Zip::unpackTargets($finalFileName, $unpackFiles);
            } catch (\Exception $ex) {
                $fail = true;
                $msg = "Request resource not found : \"" . $finalFileName . $ds . "original-image-fake.jpg\"";
                $this->assertSame($msg, $ex->getMessage());
            }
            $this->assertTrue($fail, "Test must fail");
        }
    }



    public function test_method_unpackTargets()
    {
        $ds = DIRECTORY_SEPARATOR;
        $testDir = realpath(__DIR__ . $ds . "files") . $ds;
        $finalFileName = realpath(__DIR__) . $ds . "files.zip";
        $unpackedDir = realpath(__DIR__) . $ds . "unpack_targets";
        $unpackedTempDir = realpath(__DIR__) . $ds . "files_temp";
        $unpackFiles = [
            "original-image.jpg" => $unpackedDir,
            "original-image.gif" => $unpackedDir,
            "original-image.png" => $unpackedDir,
            "dirinside" => $unpackedDir
        ];


        if (file_exists($finalFileName)) {
            unlink($finalFileName);
        }

        if (file_exists($unpackedTempDir)) {
            dir_deltree($unpackedTempDir);
        }

        if (file_exists($unpackedDir)) {
            dir_deltree($unpackedDir);
        }

        $dirInsideDir = $testDir . "dirinside" . $ds;
        if (!file_exists($dirInsideDir)) {
            mkdir($dirInsideDir, 700);
            copy($testDir . "original-image.jpg", $dirInsideDir. "original-image.jpg");
            copy($testDir . "original-image.png", $dirInsideDir. "original-image.png");
        }


        if (file_exists($testDir)) {
            $r = Zip::pack($testDir);
            $this->assertTrue($r);
            $this->assertTrue(file_exists($finalFileName));


            $r = Zip::unpackTargets($finalFileName, $unpackFiles);
            $this->assertTrue($r);

            foreach ($unpackFiles as $key => $value) {
                $this->assertTrue(file_exists($value));
            }

            //dir_deltree($dirInsideDir);
        }
    }
}
