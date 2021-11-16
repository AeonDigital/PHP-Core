<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Tools\Image as Image;

require_once __DIR__ . "/../../phpunit.php";







class ImageTest extends TestCase
{





    public static function tearDownAfterClass() : void
    {
        $ds = DIRECTORY_SEPARATOR;
        $testDir = realpath(__DIR__ . $ds . "files") . $ds;

        echo "\n\n";
        echo "----------\n";
        echo "-- \n";
        echo "-- Verifique as imagens criadas em: \n";
        echo "-- " . $testDir . "\"\n";
        echo "-- \n";
        echo "----------\n\n";
    }





    public function test_method_resize_jpg()
    {
        $ds = DIRECTORY_SEPARATOR;
        $testDir = realpath(__DIR__ . $ds . "files") . $ds;
        $targetImagePath = $testDir . "original-image.jpg";


        if (file_exists($targetImagePath)) {
            // Este teste consiste em criar várias imagens com algumas configurações
            // diferentes para serem avaliadas por um humano.
            // Os asserts aqui tem capacidade de identificar as dimensões das imagens
            // mas não se elas foram criadas conforme desejado.
            $imageConfigs = [
                // Altera a imagem de teste
                // de forma EXATA,
                // redimensionando-a para os valores indicados.
                [
                    "finalPath" => $testDir . "final_jpg_exact_w500_h500.jpg",
                    "resizeType" => "exact",
                    "width" => 500,
                    "height" => 500
                ],
                // Altera a imagem de teste
                // de forma PORTRAIT [retrato, mais vertical que horizontal],
                // Neste caso a imagem é redimencionada a partir de sua altura
                // e alterada até encontrar o limite indicado.
                // A largura sofrerá a alteração necessaria para manter a proporcionalidade
                // original da imagem.
                [
                    "finalPath" => $testDir . "final_jpg_portrait_h700.jpg",
                    "resizeType" => "portrait",
                    "height" => 700
                ],
                // Altera a imagem de teste
                // de forma LANDSCAPE [paisagem, mais horizontal que vertical],
                // Neste caso a imagem é redimencionada a partir de sua largura
                // e alterada até encontrar o limite indicado.
                // A alura sofrerá a alteração necessaria para manter a proporcionalidade
                // original da imagem.
                [
                    "finalPath" => $testDir . "final_jpg_landscape_w700.jpg",
                    "resizeType" => "landscape",
                    "width" => 700,
                ],
                // Altera a imagem de teste
                // de forma AUTO.
                // Neste caso a imagem é redimencionada em ambas as dimensões até
                // que uma de suas dimensões encontre o valor indicado para Altura ou Largura,
                // aquela que vier primeiro.
                [
                    "finalPath" => $testDir . "final_jpg_auto_w500_h500.jpg",
                    "resizeType" => "auto",
                    "width" => 500,
                    "height" => 500
                ]
            ];




            // Inicialmente exclui qualquer imagem de teste anterior.
            foreach ($imageConfigs as $cfg) {
                if (file_exists($cfg["finalPath"])) {
                    unlink($cfg["finalPath"]);
                }
            }


            // Altera as imagens conforme as configurações definidas.
            foreach ($imageConfigs as $cfg) {
                $useW = (isset($cfg["width"]) ? $cfg["width"] : null);
                $useH = (isset($cfg["height"]) ? $cfg["height"] : null);

                $r = Image::resize($targetImagePath, $cfg["finalPath"], $cfg["resizeType"], $useW, $useH);
                $this->assertTrue($r);
            }
        }
    }



    public function test_method_resize_gif()
    {
        $ds = DIRECTORY_SEPARATOR;
        $testDir = realpath(__DIR__ . $ds . "files") . $ds;
        $targetImagePath = $testDir . "original-image.gif";


        if (file_exists($targetImagePath)) {
            // Este teste consiste em criar várias imagens com algumas configurações
            // diferentes para serem avaliadas por um humano.
            // Os asserts aqui tem capacidade de identificar as dimensões das imagens
            // mas não se elas foram criadas conforme desejado.
            $imageConfigs = [
                // Altera a imagem de teste
                // de forma EXATA,
                // redimensionando-a para os valores indicados.
                [
                    "finalPath" => $testDir . "final_gif_exact_w500_h500.gif",
                    "resizeType" => "exact",
                    "width" => 500,
                    "height" => 500
                ],
                // Altera a imagem de teste
                // de forma PORTRAIT [retrato, mais vertical que horizontal],
                // Neste caso a imagem é redimencionada a partir de sua altura
                // e alterada até encontrar o limite indicado.
                // A largura sofrerá a alteração necessaria para manter a proporcionalidade
                // original da imagem.
                [
                    "finalPath" => $testDir . "final_gif_portrait_h700.gif",
                    "resizeType" => "portrait",
                    "height" => 700
                ],
                // Altera a imagem de teste
                // de forma LANDSCAPE [paisagem, mais horizontal que vertical],
                // Neste caso a imagem é redimencionada a partir de sua largura
                // e alterada até encontrar o limite indicado.
                // A alura sofrerá a alteração necessaria para manter a proporcionalidade
                // original da imagem.
                [
                    "finalPath" => $testDir . "final_gif_landscape_w700.gif",
                    "resizeType" => "landscape",
                    "width" => 700,
                ],
                // Altera a imagem de teste
                // de forma AUTO.
                // Neste caso a imagem é redimencionada em ambas as dimensões até
                // que uma de suas dimensões encontre o valor indicado para Altura ou Largura,
                // aquela que vier primeiro.
                [
                    "finalPath" => $testDir . "final_gif_auto_w500_h500.gif",
                    "resizeType" => "auto",
                    "width" => 500,
                    "height" => 500
                ]
            ];



            // Inicialmente exclui qualquer imagem de teste anterior.
            foreach ($imageConfigs as $cfg) {
                if (file_exists($cfg["finalPath"])) {
                    unlink($cfg["finalPath"]);
                }
            }


            // Altera as imagens conforme as configurações definidas.
            foreach ($imageConfigs as $cfg) {
                $useW = (isset($cfg["width"]) ? $cfg["width"] : null);
                $useH = (isset($cfg["height"]) ? $cfg["height"] : null);

                $r = Image::resize($targetImagePath, $cfg["finalPath"], $cfg["resizeType"], $useW, $useH);
                $this->assertTrue($r);
            }
        }
    }



    public function test_method_resize_png()
    {
        $ds = DIRECTORY_SEPARATOR;
        $testDir = realpath(__DIR__ . $ds . "files") . $ds;
        $targetImagePath = $testDir . "original-image.png";


        if (file_exists($targetImagePath)) {
            // Este teste consiste em criar várias imagens com algumas configurações
            // diferentes para serem avaliadas por um humano.
            // Os asserts aqui tem capacidade de identificar as dimensões das imagens
            // mas não se elas foram criadas conforme desejado.
            $imageConfigs = [
                // Altera a imagem de teste
                // de forma EXATA,
                // redimensionando-a para os valores indicados.
                [
                    "finalPath" => $testDir . "final_png_exact_w500_h500.png",
                    "resizeType" => "exact",
                    "width" => 500,
                    "height" => 500
                ],
                // Altera a imagem de teste
                // de forma PORTRAIT [retrato, mais vertical que horizontal],
                // Neste caso a imagem é redimencionada a partir de sua altura
                // e alterada até encontrar o limite indicado.
                // A largura sofrerá a alteração necessaria para manter a proporcionalidade
                // original da imagem.
                [
                    "finalPath" => $testDir . "final_png_portrait_h700.png",
                    "resizeType" => "portrait",
                    "height" => 700
                ],
                // Altera a imagem de teste
                // de forma LANDSCAPE [paisagem, mais horizontal que vertical],
                // Neste caso a imagem é redimencionada a partir de sua largura
                // e alterada até encontrar o limite indicado.
                // A alura sofrerá a alteração necessaria para manter a proporcionalidade
                // original da imagem.
                [
                    "finalPath" => $testDir . "final_png_landscape_w700.png",
                    "resizeType" => "landscape",
                    "width" => 700,
                ],
                // Altera a imagem de teste
                // de forma AUTO.
                // Neste caso a imagem é redimencionada em ambas as dimensões até
                // que uma de suas dimensões encontre o valor indicado para Altura ou Largura,
                // aquela que vier primeiro.
                [
                    "finalPath" => $testDir . "final_png_auto_w500_h500.png",
                    "resizeType" => "auto",
                    "width" => 500,
                    "height" => 500
                ]
            ];




            // Inicialmente exclui qualquer imagem de teste anterior.
            foreach ($imageConfigs as $cfg) {
                if (file_exists($cfg["finalPath"])) {
                    unlink($cfg["finalPath"]);
                }
            }


            // Altera as imagens conforme as configurações definidas.
            foreach ($imageConfigs as $cfg) {
                $useW = (isset($cfg["width"]) ? $cfg["width"] : null);
                $useH = (isset($cfg["height"]) ? $cfg["height"] : null);

                $r = Image::resize($targetImagePath, $cfg["finalPath"], $cfg["resizeType"], $useW, $useH);
                $this->assertTrue($r);
            }
        }
    }



    public function test_method_resize_fail()
    {
        $ds = DIRECTORY_SEPARATOR;
        $testDir = realpath(__DIR__ . $ds . "files") . $ds;
        $targetImagePath = $testDir . "original-image.jpeg";
        $this->assertSame(false, file_exists($targetImagePath));

        try {
            $r = Image::resize($targetImagePath, "original-image-fail.jpeg", "auto", 500, 500);
        } catch (\Exception $ex) {
            $fail = true;
            $msg = "Could not load the target image. File \"" . $targetImagePath . "\" .";
            $this->assertSame($msg, $ex->getMessage());
        }
        $this->assertTrue($fail, "Test must fail");



        try {
            $targetImagePath = $testDir . "original-image.jpegg";
            $r = Image::resize($targetImagePath, "original-image-fail.jpeg", "auto", 500, 500);
        } catch (\Exception $ex) {
            $fail = true;
            $msg = "Could not load the target image. File \"" . $targetImagePath . "\" .";
            $this->assertSame($msg, $ex->getMessage());
        }
        $this->assertTrue($fail, "Test must fail");
    }



    public function test_method_resize_auto_portrait()
    {
        $ds = DIRECTORY_SEPARATOR;
        $testDir = realpath(__DIR__ . $ds . "files") . $ds;
        $targetImagePath = $testDir . "original-image-test-auto-portrait.jpg";


        if (file_exists($targetImagePath)) {
            // Este teste utiliza o tipo "auto" de alteração.
            // Ele consiste em pegar uma imagem cuja altura original é maior que a largura original,
            // assim, internamente, seu calculo de proporção final será dado da mesma forma
            // que a alteração do tipo "portrait".

            // Não é necessário testar o caso oposto, onde a imagem original tem largura maior que altura
            // pois é o que ocorre nos demais testes desta bateria.
            $imageConfigs = [
                [
                    "finalPath" => $testDir . "final-test-auto-portrait.jpg",
                    "resizeType" => "auto",
                    "width" => 300,
                    "height" => 700
                ],
            ];




            // Inicialmente exclui qualquer imagem de teste anterior.
            foreach ($imageConfigs as $cfg) {
                if (file_exists($cfg["finalPath"])) {
                    unlink($cfg["finalPath"]);
                }
            }


            // Altera as imagens conforme as configurações definidas.
            foreach ($imageConfigs as $cfg) {
                $useW = (isset($cfg["width"]) ? $cfg["width"] : null);
                $useH = (isset($cfg["height"]) ? $cfg["height"] : null);

                $r = Image::resize($targetImagePath, $cfg["finalPath"], $cfg["resizeType"], $useW, $useH);
                $this->assertTrue($r);
            }
        }
    }



    public function test_method_resize_auto_equal()
    {
        $ds = DIRECTORY_SEPARATOR;
        $testDir = realpath(__DIR__ . $ds . "files") . $ds;
        $targetImagePath = $testDir . "original-image-test-auto-equal.jpg";


        if (file_exists($targetImagePath)) {
            // Este teste utiliza o tipo "auto" de alteração.
            // Ele consiste em pegar uma imagem cuja largura e altura originais são iguais
            // assim, internamente, seu calculo de proporção final será dado pela proporção
            // perseguida pelas dimensões finais da imagem resultante.

            $imageConfigs = [
                // "quadrada"
                // largura e altura sendo iguais
                [
                    "finalPath" => $testDir . "final-test-auto-equal-square-final.jpg",
                    "resizeType" => "auto",
                    "width" => 650,
                    "height" => 500
                ],
            ];




            // Inicialmente exclui qualquer imagem de teste anterior.
            foreach ($imageConfigs as $cfg) {
                if (file_exists($cfg["finalPath"])) {
                    unlink($cfg["finalPath"]);
                }
            }


            // Altera as imagens conforme as configurações definidas.
            foreach ($imageConfigs as $cfg) {
                $useW = (isset($cfg["width"]) ? $cfg["width"] : null);
                $useH = (isset($cfg["height"]) ? $cfg["height"] : null);

                $r = Image::resize($targetImagePath, $cfg["finalPath"], $cfg["resizeType"], $useW, $useH);
                $this->assertTrue($r);
            }
        }
    }





    public function test_method_crop_jpg()
    {
        $ds = DIRECTORY_SEPARATOR;
        $testDir = realpath(__DIR__ . $ds . "files") . $ds;
        $targetImagePath = $testDir . "original-image.jpg";


        if (file_exists($targetImagePath)) {
            // Este teste consiste em criar várias imagens com algumas configurações
            // diferentes para serem avaliadas por um humano.
            // Os asserts aqui tem capacidade de identificar as dimensões das imagens
            // mas não se elas foram criadas conforme desejado.
            $imageConfigs = [
                // Altera a imagem de teste
                // de forma EXATA,
                // redimensionando-a para os valores indicados.
                [
                    "finalPath" => $testDir . "final_crop_w75_h75.jpg",
                    "resizeType" => "auto",
                    "width" => 500,
                    "height" => 375,
                    "crop"  => true,
                    "cropW" => 75,
                    "cropH" => 75,
                    "cropX" => 150,
                    "cropY" => 150,
                ]
            ];




            // Inicialmente exclui qualquer imagem de teste anterior.
            foreach ($imageConfigs as $cfg) {
                if (file_exists($cfg["finalPath"])) {
                    unlink($cfg["finalPath"]);
                }
            }


            // Altera as imagens conforme as configurações definidas.
            foreach ($imageConfigs as $cfg) {
                $useW = (isset($cfg["width"]) ? $cfg["width"] : null);
                $useH = (isset($cfg["height"]) ? $cfg["height"] : null);
                $crop = (isset($cfg["crop"]) ? $cfg["crop"] : false);
                $cropW = (isset($cfg["cropW"]) ? $cfg["cropW"] : null);
                $cropH = (isset($cfg["cropH"]) ? $cfg["cropH"] : null);
                $cropX = (isset($cfg["cropX"]) ? $cfg["cropX"] : null);
                $cropY = (isset($cfg["cropY"]) ? $cfg["cropY"] : null);


                $r = Image::resize( $targetImagePath,
                                    $cfg["finalPath"],
                                    $cfg["resizeType"],
                                    $useW,
                                    $useH);
                $this->assertTrue($r);


                $r = Image::crop(   $cfg["finalPath"],
                                    null,
                                    $cropW,
                                    $cropH,
                                    $cropX,
                                    $cropY);
                $this->assertTrue($r);
            }
        }
    }



    public function test_method_crop_gif()
    {
        $ds = DIRECTORY_SEPARATOR;
        $testDir = realpath(__DIR__ . $ds . "files") . $ds;
        $targetImagePath = $testDir . "original-image.gif";


        if (file_exists($targetImagePath)) {
            // Este teste consiste em criar várias imagens com algumas configurações
            // diferentes para serem avaliadas por um humano.
            // Os asserts aqui tem capacidade de identificar as dimensões das imagens
            // mas não se elas foram criadas conforme desejado.
            $imageConfigs = [
                // Altera a imagem de teste
                // de forma EXATA,
                // redimensionando-a para os valores indicados.
                [
                    "finalPath" => $testDir . "final_crop_w75_h75.gif",
                    "resizeType" => "auto",
                    "width" => 500,
                    "height" => 375,
                    "crop"  => true,
                    "cropW" => 75,
                    "cropH" => 75,
                    "cropX" => 150,
                    "cropY" => 150,
                ]
            ];




            // Inicialmente exclui qualquer imagem de teste anterior.
            foreach ($imageConfigs as $cfg) {
                if (file_exists($cfg["finalPath"])) {
                    unlink($cfg["finalPath"]);
                }
            }


            // Altera as imagens conforme as configurações definidas.
            foreach ($imageConfigs as $cfg) {
                $useW = (isset($cfg["width"]) ? $cfg["width"] : null);
                $useH = (isset($cfg["height"]) ? $cfg["height"] : null);
                $crop = (isset($cfg["crop"]) ? $cfg["crop"] : false);
                $cropW = (isset($cfg["cropW"]) ? $cfg["cropW"] : null);
                $cropH = (isset($cfg["cropH"]) ? $cfg["cropH"] : null);
                $cropX = (isset($cfg["cropX"]) ? $cfg["cropX"] : null);
                $cropY = (isset($cfg["cropY"]) ? $cfg["cropY"] : null);

                $r = Image::resize( $targetImagePath,
                                    $cfg["finalPath"],
                                    $cfg["resizeType"],
                                    $useW,
                                    $useH);
                $this->assertTrue($r);


                $r = Image::crop(   $cfg["finalPath"],
                                    null,
                                    $cropW,
                                    $cropH,
                                    $cropX,
                                    $cropY);
                $this->assertTrue($r);
            }
        }
    }



    public function test_method_crop_png()
    {
        $ds = DIRECTORY_SEPARATOR;
        $testDir = realpath(__DIR__ . $ds . "files") . $ds;
        $targetImagePath = $testDir . "original-image.png";


        if (file_exists($targetImagePath)) {
            // Este teste consiste em criar várias imagens com algumas configurações
            // diferentes para serem avaliadas por um humano.
            // Os asserts aqui tem capacidade de identificar as dimensões das imagens
            // mas não se elas foram criadas conforme desejado.
            $imageConfigs = [
                // Altera a imagem de teste
                // de forma EXATA,
                // redimensionando-a para os valores indicados.
                [
                    "finalPath" => $testDir . "final_crop_w75_h75.gif",  // <-- Está com a extenção errada de propósito.
                    "resizeType" => "auto",
                    "width" => 500,
                    "height" => 375,
                    "crop"  => true,
                    "cropW" => 75,
                    "cropH" => 75,
                    "cropX" => 150,
                    "cropY" => 150,
                ]
            ];




            // Inicialmente exclui qualquer imagem de teste anterior.
            foreach ($imageConfigs as $cfg) {
                if (file_exists($cfg["finalPath"])) {
                    unlink($cfg["finalPath"]);
                }
            }


            // Altera as imagens conforme as configurações definidas.
            foreach ($imageConfigs as $cfg) {
                $useW = (isset($cfg["width"]) ? $cfg["width"] : null);
                $useH = (isset($cfg["height"]) ? $cfg["height"] : null);
                $crop = (isset($cfg["crop"]) ? $cfg["crop"] : false);
                $cropW = (isset($cfg["cropW"]) ? $cfg["cropW"] : null);
                $cropH = (isset($cfg["cropH"]) ? $cfg["cropH"] : null);
                $cropX = (isset($cfg["cropX"]) ? $cfg["cropX"] : null);
                $cropY = (isset($cfg["cropY"]) ? $cfg["cropY"] : null);


                $r = Image::resize( $targetImagePath,
                                    $cfg["finalPath"],
                                    $cfg["resizeType"],
                                    $useW,
                                    $useH);
                $this->assertTrue($r);


                // o nome final da imagem abaixo está com um ajuste pois a extenção estava errada de
                // propósito para poder testar a manutenção da mesma entre as transformações.
                $r = Image::crop(   str_replace(".gif", ".png", $cfg["finalPath"]),
                                    null,
                                    $cropW,
                                    $cropH,
                                    $cropX,
                                    $cropY);
                $this->assertTrue($r);
            }
        }
    }
}
