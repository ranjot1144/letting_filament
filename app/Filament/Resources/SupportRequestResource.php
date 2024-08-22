<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SupportRequestResource\Pages;
use App\Filament\Resources\SupportRequestResource\RelationManagers;
use App\Models\SupportRequest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SupportRequestResource extends Resource
{
    protected static ?string $model = SupportRequest::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function table(Table $table): Table
    {
            return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('email')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('subject')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('details')->sortable(),
                Tables\Columns\TextColumn::make('created_at')->label('Submitted At')->sortable(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSupportRequests::route('/'),
        ];
    }
}
