<?php

namespace Tests;

use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Illuminate\Support\Facades\Artisan;
use Laravel\Dusk\TestCase as BaseTestCase;

abstract class DuskTestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Prepare for Dusk test execution.
     *
     * @beforeClass
     * @return void
     */
    public static function prepare()
    {
        static::startChromeDriver();
    }

    /**
     * Create the RemoteWebDriver instance.
     *
     * @return \Facebook\WebDriver\Remote\RemoteWebDriver
     */
    protected function driver()
    {
        $options = (new ChromeOptions)->addArguments([
            '--disable-gpu',
            '--headless',
            '--window-size=1920,1080',
        ]);

        return RemoteWebDriver::create(
            'http://localhost:9515', DesiredCapabilities::chrome()->setCapability(
                ChromeOptions::CAPABILITY, $options
            )
        );
    }
}

/*
$browser->assertTitle($title)	Заголовок страницы совпадает с заданным текстом.
$browser->assertTitleContains($title)	В заголовке страницы содержится заданный текст.
$browser->assertPathBeginsWith($path)	Текущий путь URL начинается с заданного пути.
$browser->assertPathIs('/home')	Текущий пути совпадает с заданным путём.
$browser->assertPathIsNot('/home')	Текущий путь не совпадает с заданным путём.
$browser->assertRouteIs($name, $parameters)	Текущий URL совпадает с заданным URL именованного роута.
$browser->assertQueryStringHas($name, $value)	Заданный параметр строки запроса присутствует и имеет заданное значение.
$browser->assertQueryStringMissing($name)	Заданный параметр строки запроса отсутствует.
$browser->assertHasQueryStringParameter($name)	Заданный параметр строки запроса присутствует.
$browser->assertHasCookie($name)	Заданный cookie присутствует.
$browser->assertCookieValue($name, $value)	В cookie есть заданное значение.
$browser->assertPlainCookieValue($name, $value)	В незашифрованном cookie есть заданное значение.
$browser->assertSee($text)	Заданный текст присутствует на странице.
$browser->assertDontSee($text)	Заданный текст не присутствует на странице.
$browser->assertSeeIn($selector, $text)	Заданный текст присутствует в селекторе.
$browser->assertDontSeeIn($selector, $text)	Заданный текст не присутствует в селекторе.
$browser->assertSourceHas($code)	Заданный исходный код присутствует на странице.
$browser->assertSourceMissing($code)	Заданный исходный код не присутствует на странице.
$browser->assertSeeLink($linkText)	Заданная ссылка присутствует на странице.
$browser->assertDontSeeLink($linkText)	Заданная ссылка не присутствует на странице.
$browser->assertSeeLink($link)	Определить видима ли заданная ссылка.
$browser->assertInputValue($field, $value)	Заданное поле ввода имеет заданное значение.
$browser->assertInputValueIsNot($field, $value)	Заданное поле ввода не имеет заданное значение.
$browser->assertChecked($field)	Заданный чекбокс помечен.
$browser->assertNotChecked($field)	Заданный чекбокс не помечен.
$browser->assertRadioSelected($field, $value)	Заданное радиополе помечено.
$browser->assertRadioNotSelected($field, $value)	Заданное радиополе не помечено.
$browser->assertSelected($field, $value)	В заданном выпадающем списке выбрано заданное значение.
$browser->assertNotSelected($field, $value)	В заданном выпадающем списке не выбрано заданное значение.
$browser->assertSelectHasOptions($field, $values)	Заданный массив значений доступен для выбора.
$browser->assertSelectMissingOptions($field, $values)	Заданный массив значений не доступен для выбора.
$browser->assertSelectHasOption($field, $value)	Заданное значение доступно для выбора в заданном поле.
$browser->assertValue($selector, $value)	У элемента, совпадающего с заданным селектором, есть заданное значение.
$browser->assertVisible($selector)	Элемент, совпадающий с заданным селектором, видим.
$browser->assertMissing($selector)	Элемент, совпадающий с заданным селектором, невидим.
$browser->assertDialogOpened($message)	Был открыт JavaScript-диалог с заданным сообщением.
 */
