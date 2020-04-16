<?php

namespace Language;

class LanguageBatchBo
{

	public static function generateLanguageFiles()
	{

		$languageResponse = ApiCall::call('getLanguageFile');

		if ($languageResponse['status'] == 'OK') {

			foreach($languageResponse['data'] as $x => $x_value) {

					$destination = self::getPath('portal') . $x . '.php';

					self::CreateDirIf($destination);

					$result = file_put_contents($destination, $x_value);

					echo "$destination fájl generálása megtörtént <br /><br />\n";
			}
		}
		else {
			echo "Az adatok nem érkeztek meg.<br /><br />\n";
		}
	}

	public static function generateAppletLanguageXmlFiles()
	{
		$xmlContent = ApiCall::call('getAppletLanguageFile');

		if ($xmlContent['status'] == 'OK') {

			foreach($xmlContent['data'] as $x => $x_value) {

					$xmlFile = self::getPath('flash') . '/lang_' . $x . '.xml';

					self::CreateDirIf($xmlFile);

					$result = file_put_contents($xmlFile, $x_value);
					echo "$xmlFile fájl generálása megtörtént<br /><br />\n";
			}
		}
		else {
			echo "Az adatok nem érkeztek meg. <br /><br />\n";
		}
	}

	protected static function getPath($application)
	{
		return Config::get('system.paths.root') . '/cache/' . $application. '/';
	}

	protected static function CreateDirIf($path)
	{
		if (!is_dir(dirname($path))) {
		  	mkdir(dirname($path), 0755, true);
				echo "$path fájl mappája nem létezett, ezért létrehoztam.<br /><br />\n";
	}
	}
}
