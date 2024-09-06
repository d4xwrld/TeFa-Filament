<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use App\Models\Category;
use Faker\Provider\ar_EG\Text;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ImageUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Illuminate\Support\Facades\Auth;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use function Laravel\Prompts\text;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label('Title')
                    ->required()
                    ->placeholder('Masukkan Judul'),
                Textarea::make('description')
                    ->label('Description')
                    ->rows(5)
                    ->required()
                    ->placeholder('Masukkan Deskripsi'),
                FileUpload::make('image_url') // Field di form Filament
                    ->label('Upload Image')
                    ->required(),
                Select::make('category_id')
                    ->label('Category')
                    ->required()
                    ->options(
                        Category::all()->pluck('name', 'id')->toArray()
                    ),
                TextInput::make('user_id')
                    ->label('User')
                    ->default(Auth::user()->id)
                    ->hidden(), // Hide the field instead of disabling it
                TextInput::make('slug')
                    ->label('Slug')
                    ->hidden(),
            ]);
    }
    

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('description')
                    ->searchable()
                    ->sortable(),
                ImageColumn::make('image_url')
                    ->searchable()
                    ->disk('public')
                    // ->directory('images')
                    ->sortable(),
                TextColumn::make('slug'),
                TextColumn::make('category.name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('user.name')
                    ->label('Uploaded By')
                    ->searchable()
                    ->sortable(),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}