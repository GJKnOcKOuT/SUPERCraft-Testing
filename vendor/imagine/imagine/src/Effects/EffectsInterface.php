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


/*
 * This file is part of the Imagine package.
 *
 * (c) Bulat Shakirzyanov <mallluhuct@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Imagine\Effects;

use Imagine\Image\Palette\Color\ColorInterface;
use Imagine\Utils\Matrix;

/**
 * Interface for the effects.
 */
interface EffectsInterface
{
    /**
     * Apply gamma correction.
     *
     * @param float $correction
     *
     * @throws \Imagine\Exception\RuntimeException
     *
     * @return $this
     */
    public function gamma($correction);

    /**
     * Invert the colors of the image.
     *
     * @throws \Imagine\Exception\RuntimeException
     *
     * @return $this
     */
    public function negative();

    /**
     * Grayscale the image.
     *
     * @throws \Imagine\Exception\RuntimeException
     *
     * @return $this
     */
    public function grayscale();

    /**
     * Colorize the image.
     *
     * @param \Imagine\Image\Palette\Color\ColorInterface $color
     *
     * @throws \Imagine\Exception\RuntimeException
     *
     * @return $this
     */
    public function colorize(ColorInterface $color);

    /**
     * Sharpens the image.
     *
     * @throws \Imagine\Exception\RuntimeException
     *
     * @return $this
     */
    public function sharpen();

    /**
     * Blur the image.
     *
     * @param float|int $sigma
     *
     * @throws \Imagine\Exception\RuntimeException
     *
     * @return $this
     */
    public function blur($sigma);

    /**
     * Changes the brightness of the image.
     *
     * @param int $brightness The level of brightness (-100 (black) to 100 (white))
     *
     * @throws \Imagine\Exception\RuntimeException
     *
     * @return $this
     */
    public function brightness($brightness);

    /**
     * Convolves the image.
     *
     * @param \Imagine\Utils\Matrix $matrix The matrix from which derive the convolution kernel
     *
     * @throws \Imagine\Exception\RuntimeException
     *
     * @return $this
     */
    public function convolve(Matrix $matrix);
}
