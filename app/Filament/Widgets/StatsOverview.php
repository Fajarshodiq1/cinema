<?php

namespace App\Filament\Widgets;

use App\Models\BookingTransaction;
use App\Models\WorkshopParticipant;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;


class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $totalIncome = BookingTransaction::where('is_paid', true)->sum('total_amount');
        $totalBookings = BookingTransaction::count();
        $pendingPayments = BookingTransaction::where('is_paid', false)->count();
        $totalParticipants = WorkshopParticipant::count();
        
        return [
            Stat::make('Total Income', 'IDR ' . number_format($totalIncome, 2))
                ->description('Total revenue from completed transactions')
                ->color('success'),

            Stat::make('Total Bookings', $totalBookings)
                ->description('All bookings in the system')
                ->color('primary'),

            Stat::make('Pending Payments', $pendingPayments)
                ->description('Transactions awaiting payment')
                ->color('danger'),
            Stat::make('Total Participants', $totalParticipants)
                ->description('All-time participants')
                ->color('primary'),
        ];
    }
}