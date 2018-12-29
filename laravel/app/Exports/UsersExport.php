<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class UsersExport implements 
    FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    public function collection()
    {
        $users = User::all('id', 'name', 'is_admin', 'email', 'created_at');

        foreach ($users as $user) {
            $user['is_admin'] = $user['is_admin'] ? 'Yes' : 'No';
        }

        return $users;
    }

    public function headings(): array {
        return [
            '#',
            'Name',
            'Admin',
            'Email',
            'Created at'
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getDelegate()->getStyle('A1:E1')->getFont()->setSize(14);
            },
        ];
    }
}
