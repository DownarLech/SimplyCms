<?php declare(strict_types=1);

namespace App\Shared\Csv;

use League\Csv\Reader;

class CsvImporter
{
    private array $header;

    public function __construct()
    {
    }

    /**
     * @return \Iterator data provider
     * @throws \League\Csv\Exception
     */
    public function loadCsvData(string $path)
    {
        $readerCsv = Reader::createFromPath($path);
        $readerCsv->setHeaderOffset(0);

        $this->header = $readerCsv->getHeader();
        $records = $readerCsv->getRecords(); // ?\Iterator
        // return Statement::create()->process($readerCsv);
        return $records;
    }

    public function getHeader(): array
    {
        return $this->header;
    }

}