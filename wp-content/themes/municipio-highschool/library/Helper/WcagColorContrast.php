<?php

namespace MunicipioHighSchool\Helper;

class WcagColorContrast
{
    /**
     * Run a calculation
     * @param  string  $color1
     * @param  string  $color2
     * @param  string  $level
     * @return boolean
     */
    public static function isValid($color1, $color2, $level = 'AA-Normal')
    {
        $color1 = ltrim($color1, '#');
        $color2 = ltrim($color2, '#');

        $result = self::evaluateColorContrast($color1, $color2);
        return isset($result[$level]) ? $result[$level] : null;
    }

    /**
     * Calculates the luminosity of an given RGB color
     * The color code must be in the format of RRGGBB
     * The luminosity equations are from the WCAG 2 requirements
     * http://www.w3.org/TR/WCAG20/#relativeluminancedef
     * @param  string $color
     * @return float
     */
    public static function calculateLuminosity($color)
    {
        $r = hexdec(substr($color, 0, 2)) / 255; // red value
        $g = hexdec(substr($color, 2, 2)) / 255; // green value
        $b = hexdec(substr($color, 4, 2)) / 255; // blue value

        if ($r <= 0.03928) {
            $r = $r / 12.92;
        } else {
            $r = pow((($r + 0.055) / 1.055), 2.4);
        }

        if ($g <= 0.03928) {
            $g = $g / 12.92;
        } else {
            $g = pow((($g + 0.055) / 1.055), 2.4);
        }

        if ($b <= 0.03928) {
            $b = $b / 12.92;
        } else {
            $b = pow((($b + 0.055) / 1.055), 2.4);
        }

        $luminosity = 0.2126 * $r + 0.7152 * $g + 0.0722 * $b;

        return $luminosity;
    }

    /**
     * Calculates the luminosity ratio of two colors
     * The luminosity ratio equations are from the WCAG 2 requirements
     * http://www.w3.org/TR/WCAG20/#contrast-ratiodef
     * @param  string $color1
     * @param  string $color2
     * @return float
     */
    public static function calculateLuminosityRatio($color1, $color2)
    {
        $l1 = self::calculateLuminosity($color1);
        $l2 = self::calculateLuminosity($color2);

        if ($l1 > $l2) {
            $ratio = (($l1 + 0.05) / ($l2 + 0.05));
        } else {
            $ratio = (($l2 + 0.05) / ($l1 + 0.05));
        }

        return $ratio;
    }


    /**
     * returns an array with the results of the color contrast analysis
     * it returns akey for each level (AA and AAA, both for normal and large or bold text)
     * it also returns the calculated contrast ratio
     * the ratio levels are from the WCAG 2 requirements
     * http://www.w3.org/TR/WCAG20/#visual-audio-contrast (1.4.3)
     * http://www.w3.org/TR/WCAG20/#larger-scaledef
     * @param  string $color1
     * @param  string $color2
     * @return array
     */
    public static function evaluateColorContrast($color1, $color2)
    {
        $ratio = self::calculateLuminosityRatio($color1, $color2);

        return array(
            'AA'             => $ratio >= 4.5 ? true : false,
            'AA-Large'       => $ratio >= 3 ? true : false,
            'AA-MediumBold'  => $ratio >= 3 ? true : false,
            'AAA'            => $ratio >= 7 ? true : false,
            'AAA-Large'      => $ratio >= 4.5 ? true : false,
            'AAA-MediumBold' => $ratio >= 4.5 ? true : false,
            'Ratio'          => $ratio
        );
    }
}
