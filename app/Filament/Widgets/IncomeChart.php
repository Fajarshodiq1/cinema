<?php

namespace App\Filament\Widgets;

use App\Models\BookingTransaction;
use Filament\Widgets\ChartWidget;

class IncomeChart extends ChartWidget
{
    protected static ?string $heading = 'Income Over Time';

    protected function getData(): array
    {
        // Ambil data total income per bulan dari transaksi yang sudah dibayar
        $income = BookingTransaction::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, SUM(total_amount) as total_income')
            ->where('is_paid', true)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Extract labels dan data
        $labels = $income->pluck('month')->toArray();
        $incomeData = $income->pluck('total_income')->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Income (IDR)',
                    'data' => $incomeData,
                    'backgroundColor' => 'rgba(75, 192, 192, 0.5)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'fill' => true,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line'; // Tipe chart adalah line
    }
}