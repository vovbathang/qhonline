<?php 
/**
 * This module makes it possible to upload different filetypes inside the WYSIWYG-editor. Extra filetypes are Word (doc, docm, docx), Excel (csv, xml, xls, xlsx), PDF (pdf), Compressed Folder (zip, tar)
 */

namespace Smart\WysiwygDownloads\Plugin\Magento\Cms\Model\Wysiwyg\Images;

/**
 * Class Storage
 */ 
class Storage {


    protected $_settings;
	protected $_type;

	public function __construct(
        \Smart\WysiwygDownloads\Helper\Settings $helperSettings
    ){
    	$this->_settings = $helperSettings;
    }

	public function beforeGetAllowedExtensions(
		\Magento\Cms\Model\Wysiwyg\Images\Storage $subject,
		$type
	){
		$this->_type = $type;
	}
	
	
	public function afterGetAllowedExtensions(
		\Magento\Cms\Model\Wysiwyg\Images\Storage $subject,
		$result
	){
        return array_merge($result,$this->_settings->getExtraFiletypes());
	}
}
