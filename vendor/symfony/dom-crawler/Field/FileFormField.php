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
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\DomCrawler\Field;

/**
 * FileFormField represents a file form field (an HTML file input tag).
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class FileFormField extends FormField
{
    /**
     * Sets the PHP error code associated with the field.
     *
     * @param int $error The error code (one of UPLOAD_ERR_INI_SIZE, UPLOAD_ERR_FORM_SIZE, UPLOAD_ERR_PARTIAL, UPLOAD_ERR_NO_FILE, UPLOAD_ERR_NO_TMP_DIR, UPLOAD_ERR_CANT_WRITE, or UPLOAD_ERR_EXTENSION)
     *
     * @throws \InvalidArgumentException When error code doesn't exist
     */
    public function setErrorCode($error)
    {
        $codes = array(UPLOAD_ERR_INI_SIZE, UPLOAD_ERR_FORM_SIZE, UPLOAD_ERR_PARTIAL, UPLOAD_ERR_NO_FILE, UPLOAD_ERR_NO_TMP_DIR, UPLOAD_ERR_CANT_WRITE, UPLOAD_ERR_EXTENSION);
        if (!in_array($error, $codes)) {
            throw new \InvalidArgumentException(sprintf('The error code %s is not valid.', $error));
        }

        $this->value = array('name' => '', 'type' => '', 'tmp_name' => '', 'error' => $error, 'size' => 0);
    }

    /**
     * Sets the value of the field.
     *
     * @param string $value The value of the field
     */
    public function upload($value)
    {
        $this->setValue($value);
    }

    /**
     * Sets the value of the field.
     *
     * @param string $value The value of the field
     */
    public function setValue($value)
    {
        if (null !== $value && is_readable($value)) {
            $error = UPLOAD_ERR_OK;
            $size = filesize($value);
            $info = pathinfo($value);
            $name = $info['basename'];

            // copy to a tmp location
            $tmp = sys_get_temp_dir().'/'.sha1(uniqid(mt_rand(), true));
            if (array_key_exists('extension', $info)) {
                $tmp .= '.'.$info['extension'];
            }
            if (is_file($tmp)) {
                unlink($tmp);
            }
            copy($value, $tmp);
            $value = $tmp;
        } else {
            $error = UPLOAD_ERR_NO_FILE;
            $size = 0;
            $name = '';
            $value = '';
        }

        $this->value = array('name' => $name, 'type' => '', 'tmp_name' => $value, 'error' => $error, 'size' => $size);
    }

    /**
     * Sets path to the file as string for simulating HTTP request.
     *
     * @param string $path The path to the file
     */
    public function setFilePath($path)
    {
        parent::setValue($path);
    }

    /**
     * Initializes the form field.
     *
     * @throws \LogicException When node type is incorrect
     */
    protected function initialize()
    {
        if ('input' !== $this->node->nodeName) {
            throw new \LogicException(sprintf('A FileFormField can only be created from an input tag (%s given).', $this->node->nodeName));
        }

        if ('file' !== strtolower($this->node->getAttribute('type'))) {
            throw new \LogicException(sprintf('A FileFormField can only be created from an input tag with a type of file (given type is %s).', $this->node->getAttribute('type')));
        }

        $this->setValue(null);
    }
}