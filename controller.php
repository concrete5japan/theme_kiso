<?php 
namespace Concrete\Package\ThemeKiso;

use Package;
use BlockType;
use SinglePage;
use PageTheme;
use BlockTypeSet;
use Loader;
use FileImporter;

defined('C5_EXECUTE') or die(_("Access Denied."));

class Controller extends Package
{

	protected $pkgHandle = 'theme_kiso';
	protected $appVersionRequired = '5.7.3';
	protected $pkgVersion = '1.0.0';
	protected $pkgAllowsFullContentSwap = true;

	public function getPackageDescription()
	{
    	return t("考え中。");
	}

	public function getPackageName()
	{
    	return t("Kiso");
	}

    public function import_files()
    {
            // now we add in any files that this package has
            if (is_dir($this->getPackagePath() . '/content_files'))
             {

                $fh = new FileImporter();
                $contents = Loader::helper('file')->getDirectoryContents($this->getPackagePath() . '/content_files');

                foreach ($contents as $filename)
                {
                    $f = $fh->import($this->getPackagePath() . '/content_files/' . $filename, $filename);
                }
            }
    }

	public function install()
	{
    	$pkg = parent::install();
    	BlockTypeSet::add("theme_kiso","Kiso", $pkg);
		PageTheme::add('kiso', $pkg);
	}

}
?>