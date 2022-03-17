<?php
/**
 * Copyright 2020 Art-ER S. Cons. P.A.
 * EROI - Emilia Romagna Open Innovation is based on:
 * https://www.open2.0.regione.lombardia.it
 *
 * @see https://repo.art-er.it Developers' community
 * @license GPLv3
 * @license https://opensource.org/licenses/gpl-3.0.html GNU General Public License version 3
 *
 * @package    arter
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */


namespace Mpdf\Image;

class ImageTypeGuesser
{

	/**
	 * @param string $data
	 *
	 * @return null|string
	 */
	public function guess($data)
	{
		if (in_array(substr($data, 6, 4), ['JFIF', 'Exif'], true) || strpos($data, chr(255) . chr(216)) === 0) { // 0xFF 0xD8	// mpDF 5.7.2
			return 'jpeg';
		}

		if (in_array(substr($data, 0, 6), ['GIF87a', 'GIF89a'], true)) {
			return 'gif';
		}

		if (strpos($data, chr(137) . 'PNG' . chr(13) . chr(10) . chr(26) . chr(10)) === 0) {
			return 'png';
		}

		if (strpos($data, chr(215) . chr(205) . chr(198) . chr(154)) === 0) {
			return 'wmf';
		}

		if (preg_match('/<svg.*<\/svg>/is', $data)) {
			return 'svg';
		}

		if (strpos($data, 'BM') === 0) {
			return 'bmp';
		}

		return null;
	}

}