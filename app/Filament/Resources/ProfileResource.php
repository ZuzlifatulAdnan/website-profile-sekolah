<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfileResource\Pages;
use App\Filament\Resources\ProfileResource\RelationManagers;
use App\Models\Profile;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProfileResource extends Resource
{
    protected static ?string $model = Profile::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    protected static ?string $navigationLabel = 'Profile';
    protected static ?string $activeNavigationIcon = 'heroicon-o-user-circle';
    protected static ?string $navigationGroup = 'Master';
    protected static ?int $navigationSort = 16;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('section')
                    ->label('Kategor Profile')
                    ->options([
                        'Visi' => 'Visi',
                        'Misi' => 'Misi',
                        'Sejarah' => 'Sejarah',
                        'Sambutan' => 'Sambutan',
                    ])
                    ->required(),
                // Forms\Components\FileUpload::make('foto')
                //     ->label('Foto')
                //     ->image()
                //     ->directory('uploads/agenda')
                //     ->visibility('public'),
                Forms\Components\RichEditor::make('deskripsi')
                    ->label('Deskripsi')
                    ->required()
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'underline',
                        'strike',
                        'link',
                        'bulletList',
                        'orderedList',
                        'blockquote',
                        'codeBlock',
                        'redo',
                        'undo',
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Tables\Columns\TextColumn::make('foto')
                //     ->label('Foto')
                //     ->searchable(),
                Tables\Columns\TextColumn::make('section')
                    ->label('Kategori')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProfiles::route('/'),
            'create' => Pages\CreateProfile::route('/create'),
            'edit' => Pages\EditProfile::route('/{record}/edit'),
        ];
    }
    public static function getModelLabel(): string
    {
        return __(key: 'Profile');
    }

    public static function getPluralLabel(): string
    {
        return __('Profile');
    }
}
