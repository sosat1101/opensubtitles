<?php

include_once 'DownloadOpenSubtitles.class.php';

ini_set('error_log', 'a.txt');
$downloadOpenSubtitles = new DownloadOpenSubtitles(['file_id' => 784507]);

$downloadOpenSubtitles->getResult();
$url = $downloadOpenSubtitles->getLink();
//
//$url1 = "https://www.opensubtitles.com/download/B32230A1FA60CB4978F6A2B003B1ABACB84FDE88CD2D1DC142A77AFCDD25A6D24E48EA0201709431F5980D3F111ACE2536C399B450E2531A0406B08FC96695C5B25B4F178BAD838497DA2C6E73D292E3DB88B165B9BE0E04C404E3AEE8409C7CCAD7064C96F9FA0E7D4D1A638FD302EFF9085D30C2AD8F5E2ED7AE94A487601986EB8AC0263573552AABA939313B636DECC4C012B0A8F3D45B330535CDFBBB1155AAB0E31037E8086562557B84CE2C2C3F5AFCF07665073228723CA06F805C1E60D76854E303BB845B991790633C4213FDBF73380FF4AA2E793C60DAD2213AAD5423BD702C4DC3B86B5B3F086D2A0764DC4640BA2E8A3CC5E5D1D8ACECB62FA219BD1F6400DCAFC2BA9C5EF9CEFD8BB2F56F1D43FAF2A08526419500CE539AC765D00F6AC34FC75CAF2C6FF04B13772C7D2587DB37AC3981/subfile/Let.the.Bullets.Fly.2010.720p.BluRay.x264.DTS-WiKi.eng.srt";
$pathInfo = pathinfo($url);
$basename = $pathInfo['basename'];
$extension = $pathInfo['extension'];
$filename = $pathInfo['filename'];
$contentType = '';

header("Content-Type: text/plain");
header("Content-Disposition: attachment; filename=$basename");
header("Content-Transfer-Encoding: binary");


$contents = "";
// 获取Resource
$resource = fopen($url, 'rb');
if ($resource) {
    // 开启一个大小为4096 bit的缓冲区
    ob_start(function ($chunk) {
        return $chunk;
    }, 4096);

    // 从之前获取到的Resource中以4096 bit大小读入到缓冲区，并输出
    while (true) {
        $data = @fread($resource, 4096);
        if (strlen($data) == 0) {
            break;
        }
        // 向客户端echo缓冲区内容,之后缓冲区被清空
        echo($data);
    }
    fclose($resource);
    ob_end_clean();
} else {
     throw new Exception('无法获取当前URL资源');
}












