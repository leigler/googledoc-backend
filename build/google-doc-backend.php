<?php 


  //echo 'Current PHP version: ' . phpversion();
  # composer require
  require_once 'google-api-php-client-2.1.1/vendor/autoload.php';
  require 'vendor/autoload.php';
  // html to markdown:
  use League\HTMLToMarkdown\HtmlConverter;


function the_google_doc($docID, $devKey){


  $currenttime = date("h").date("i");
  $lastrequest = file_get_contents('build/docs/time.md');


  //$fileId = '1EaBo7TwYgl-Jzg9o_UcmP2mFMW5pVpirfRqp3STIxY4'; //whatever file you want to display— put it's id here

  $fileId = $docID;

  if($currenttime >= ($lastrequest + 10) || $currenttime < $lastrequest ){
    
    # get developer key file:

    //$developerKey = file_get_contents('build/docs/developerkey.txt');
    //$developerKey = trim($developerKey); // removes any empty spaces

    $devKey = trim($devKey);
    $developerKey = $devKey;

    # google doc stuff:

    $client = new Google_Client();
    $client->setApplicationName("AIGA CDN Test");
    $client->setDeveloperKey($developerKey);

    $service = new Google_Service_Drive($client);

    # google rest: Download files
    # file id see global var before conditional
    $response = $service->files->export($fileId, 'text/html', array(
      'alt' => 'media' )); // text type
    $content = $response->getBody()->getContents();


    # remove elements by tag name to clean up html:
    $doc = new DOMDocument();
    # load the HTML into the DomDocument object (this would be your source HTML)
    $doc->loadHTML($content);

    function removeElementsByTagName($tagName, $document) {
      $nodeList = $document->getElementsByTagName($tagName);
      for ($nodeIdx = $nodeList->length; --$nodeIdx >= 0; ) {
        $node = $nodeList->item($nodeIdx);
        $node->parentNode->removeChild($node);
      }
    }
    # remove extraneous style and script tags in google doc produced html:
    removeElementsByTagName('script', $doc);
    removeElementsByTagName('style', $doc);
    removeElementsByTagName('link', $doc);

    # output cleaned html
    $content = $doc->saveHtml();

    # convert html to markdown to clean html further
    $converter = new HtmlConverter(array('strip_tags' => true));
    $markdown = $converter->convert($content);

    // parsedown for new/clean html:
    $Parsedown = new Parsedown();

    echo $Parsedown->text($markdown);

    # put updated content into md files
    file_put_contents('build/docs/cacheddoc.md', $markdown);
    file_put_contents('build/docs/time.md', $currenttime);


  } else{
    
    $cacheddoc = file_get_contents('build/docs/cacheddoc.md');

    // parsedown for new html:
    $Cachedparsedown = new Parsedown();
    echo $Cachedparsedown->text($cacheddoc);

   } 
};

?>