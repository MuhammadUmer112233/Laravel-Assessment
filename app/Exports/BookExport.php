<?php

namespace App\Exports;
use App\Models\Book;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;

class BookExport implements FromCollection,WithHeadings
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Book::select('id','title','author')->get();

    }

    public function headings(): array
    {
        return [
          '#',
          'Title',
          'Author'
        ];
    }
}

