<?php

namespace App\Filament\Widgets;

use App\Models\WorkshopParticipant;
use Filament\Widgets\ChartWidget;

class BlogPostsChart extends ChartWidget
{
    protected static ?string $heading = 'Participants Over Time';

    protected function getData(): array
    {
        // Fetch data grouped by month
        $participants = WorkshopParticipant::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Extract labels and data
        $labels = $participants->pluck('month')->toArray();
        $data = $participants->pluck('count')->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Participants',
                    'data' => $data,
                    'backgroundColor' => 'rgba(54, 162, 235, 0.5)',
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'fill' => true,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line'; // Line chart type
    }
}