<?php

namespace Keboola\Csv;

class AbstractCsvFile
{
    const DEFAULT_DELIMITER = ',';
    const DEFAULT_ENCLOSURE = '"';

    /**
     * @var string
     */
    private $delimiter;

    /**
     * @var string
     */
    private $enclosure;

    /**
     * @param string $delimiter
     * @throws InvalidArgumentException
     */
    protected function setDelimiter($delimiter)
    {
        $this->validateDelimiter($delimiter);
        $this->delimiter = $delimiter;
    }

    /**
     * @param string $delimiter
     * @throws InvalidArgumentException
     */
    protected function validateDelimiter($delimiter)
    {
        if (strlen($delimiter) > 1) {
            throw new InvalidArgumentException(
                "Delimiter must be a single character. \"$delimiter\" received",
                Exception::INVALID_PARAM
            );
        }

        if (strlen($delimiter) == 0) {
            throw new InvalidArgumentException(
                "Delimiter cannot be empty.",
                Exception::INVALID_PARAM
            );
        }
    }

    /**
     * @param string $enclosure
     * @return $this
     * @throws InvalidArgumentException
     */
    protected function setEnclosure($enclosure)
    {
        $this->validateEnclosure($enclosure);
        $this->enclosure = $enclosure;
        return $this;
    }

    /**
     * @param string $enclosure
     * @throws InvalidArgumentException
     */
    protected function validateEnclosure($enclosure)
    {
        if (strlen($enclosure) > 1) {
            throw new InvalidArgumentException(
                "Enclosure must be a single character. \"$enclosure\" received",
                Exception::INVALID_PARAM
            );
        }
    }

    /**
     * @return string
     */
    public function getDelimiter()
    {
        return $this->delimiter;
    }

    /**
     * @return string
     */
    public function getEnclosure()
    {
        return $this->enclosure;
    }
}
