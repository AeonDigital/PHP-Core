<?php
$baseTargetFileDir =  __DIR__ . "/files";





function provider_copyFile($originalFile, $copyTo)
{
    global $baseTargetFileDir;
    $oFile  = to_system_path($baseTargetFileDir . "/" . $originalFile);
    $cFile  = to_system_path($baseTargetFileDir . "/" . $copyTo);
    copy($oFile, $cFile);
}


function provider_PHPStream_ObjectStreamFromText($body = "")
{
    return fopen("data://text/plain;base64," . base64_encode($body), "r+");
}


function provider_PHPStream_ObjectStreamFromFile(
    $fileName,
    $openType = "rw",
    &$stats = null,
    &$meta = null
) {
    global $baseTargetFileDir;
    $useFilePath = to_system_path($baseTargetFileDir . "/" . $fileName);

    $r = null;
    if (file_exists($useFilePath)) {
        $r = fopen($useFilePath, $openType);
        $stats = fstat($r);
        $meta = stream_get_meta_data($r);
    }

    return $r;
}


function provider_PHPStream_InstanceOf_Stream($streamObject = null)
{
    if ($streamObject === null) {
        $streamObject = provider_PHPStream_ObjectStreamFromText();
    }
    return new \AeonDigital\Stream\Stream($streamObject);
}


function provider_PHPStream_InstanceOf_Stream_FromText($body = "")
{
    $streamObject = provider_PHPStream_ObjectStreamFromText($body);
    return new \AeonDigital\Stream\Stream($streamObject);
}


function provider_PHPStream_InstanceOf_FileStream($fileName)
{
    global $baseTargetFileDir;
    $oFile  = to_system_path($baseTargetFileDir . "/" . $fileName);
    return new \AeonDigital\Stream\FileStream($oFile);
}
