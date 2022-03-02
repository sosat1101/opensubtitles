<?php

interface Subtitles
{
    public function search(string $name, string $language = "eng"): array;
    public function download(int $subtitleId, string $language = "eng");
}