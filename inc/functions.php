<?php

class githubscraper
{
	public $url;
	public $html;
	public $errors = [];
	public $DOM;
	public $activitysvg;
	public $displayName;
	
	function __construct($url, $displayName)
    {
        $this->url = $url;
        $this->displayName = $displayName;
    }
	function Process() {
		// load an html page
		$curl = curl_init($this->url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        $this->html = curl_exec($curl);
		
		// search for specific piece of HTML; load page into DOM object; if it fails then show the errors
        $this->DOM = new DOMDocument;
        libxml_use_internal_errors(true);       // libxml should be silent; we will show errors ourselves
        if (!$this->DOM->loadHTML($this->html)) {
            $this->errors[] = libxml_get_errors();
            libxml_clear_errors();
            return false;
        }
		
		// query DOM object
        $xpath = new DOMXPath($this->DOM);

        $resultnodes = $xpath->query('//div[@class="js-contribution-graph"]/
		div[@class="mb-5 border border-gray-dark rounded-1 py-2"]/
		div[@class="js-calendar-graph is-graph-loading graph-canvas calendar-graph height-full"]');
        foreach ($resultnodes as $node) {
            $this->activitysvg = $this->DOMinnerHTML($node);
		return true;
        }
	}
	function DOMinnerHTML(DOMNode $element)
    {
        $innerHTML = "";
        $children  = $element->childNodes;

        foreach ($children as $child)
        {
            $innerHTML .= $element->ownerDocument->saveHTML($child);
        }

        return $innerHTML;
    }
}
	
	
?>