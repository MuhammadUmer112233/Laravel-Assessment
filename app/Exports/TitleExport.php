<?php

namespace App\Exports;
use App\Models\Book;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class TitleExport implements FromCollection,WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        return Book::select('id','title')->get();

    }

    public function headings(): array
    {
        return [
          '#',
          'Title'
        ];
    }
}

