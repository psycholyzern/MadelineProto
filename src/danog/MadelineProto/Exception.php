<?php
/*
Copyright 2016-2017 Daniil Gentili
(https://daniil.it)
This file is part of MadelineProto.
MadelineProto is free software: you can redistribute it and/or modify it under the terms of the GNU Affero General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
MadelineProto is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
See the GNU Affero General Public License for more details.
You should have received a copy of the GNU General Public License along with MadelineProto.
If not, see <http://www.gnu.org/licenses/>.
*/

namespace danog\MadelineProto;

class Exception extends \Exception
{
    public function __construct($message = null, $code = 0, Exception $previous = null, $file = null, $line = null)
    {
        parent::__construct($message, $code, $previous);
        if (\danog\MadelineProto\Logger::$constructed && $this->file !== __FILE__) {
            \danog\MadelineProto\Logger::log([$message.' in '.basename($this->file).':'.$this->line], \danog\MadelineProto\Logger::FATAL_ERROR);
        }
        if ($line !== null) {
            $this->line = $line;
        }
        if ($file !== null) {
            $this->file = $file;
        }
        \Rollbar\Rollbar::log($this);
    }

    /**
     * ExceptionErrorHandler.
     *
     * Error handler
     */
    public static function ExceptionErrorHandler($errno = 0, $errstr = null, $errfile = null, $errline = null)
    {
        // If error is suppressed with @, don't throw an exception
        if (error_reporting() === 0) {
            return true; // return true to continue through the others error handlers
        }
        if (\danog\MadelineProto\Logger::$constructed) {
            \danog\MadelineProto\Logger::log([$errstr.' in '.basename($errfile).':'.$errline], \danog\MadelineProto\Logger::FATAL_ERROR);
        }
        $e = new self($errstr, $errno, null, $errfile, $errline);
        throw $e;
    }
}
