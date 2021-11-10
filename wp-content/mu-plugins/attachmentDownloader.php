<?php

/*
Plugin Name: AttachmentDownloader
Description: AttachmentDownloader
Version:     1.0
Author:      Sebastian Thulin, Helsingborg Stad
*/

namespace AttachmentDownloader;

class AttachmentDownloader
{
    public $domainNameLocal = null;
    public $domainNameRemote = null;
    public $documentRoot = null;
    public $contentDir = null;
    public $urlToFile = null;
    
    public function __construct()
    {
        if (isset($_GET['getimg'])) {
            add_action('init', array($this, 'init'));
            add_filter('wp_get_attachment_image_src', array($this, 'rewriteToLiveDomain'), 700, 4);
        }
    }
    public function init()
    {
        $this->domainNameLocal    = 'helsingborg.test';
        $this->domainNameRemote   = 'helsingborg.se';
        $this->documentRoot       = str_replace('//', '/', str_replace($this->domainNameLocal, "", getcwd()));
        $this->contentDir         = WP_CONTENT_DIR;
    }
    public function rewriteToLiveDomain($url, $attachmentId = null, $size, $icon = false)
    {
        //Bail early if is admin
        if (is_admin() || !isset($url[0])) {
            return $url;
        }

        if (!$this->fileExistsLocally($url[0])) {
            $this->createRequiredPath($this->getLocalFilePath($url[0]));

            copy(str_replace($this->domainNameLocal, $this->domainNameRemote, $url[0]), $this->getLocalFilePath($url[0]));
        }

        return $url;
    }

    private function fileExistsLocally($url)
    {
        return file_exists($this->getLocalFilePath($url));
    }

    private function getLocalFilePath($url)
    {
        $re = '/(https?:\/\/)/';
        $url = preg_replace($re, "", $url);

        return str_replace($this->domainNameLocal . '/wp-content', $this->contentDir, $url);
    }

    public function createRequiredPath($fileName)
    {
        $pathName = pathinfo($fileName);

        if (isset($pathName['dirname']) && !is_dir($pathName['dirname'])) {
            mkdir($pathName['dirname'], 0777, true);
        }
    }
}
new AttachmentDownloader();
