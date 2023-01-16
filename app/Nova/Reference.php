<?php

namespace App\Nova;

use Epartment\NovaDependencyContainer\HasDependencies;
use Epartment\NovaDependencyContainer\NovaDependencyContainer;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Reference extends Resource
{
    use HasDependencies;
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Reference>
     */
    public static $model = \App\Models\Reference::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'title',
        'website_name,',
        'book_title',
        'periodic_title',
        'publishing',
        'newspaper_name',
        'locality',
        'district',
        'year',
        'day',
        'month',
        'pages'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            Select::make('Tipo', 'type')->options([
                0 => 'Livro',
                1 => 'Artigo de Revista'
                2 => 'Secção do Livro',
                3 => 'Artigo de Periódico',
                4 => 'Website'
            ])->displayUsingLabels(),

            NovaDependencyContainer::make([
                Text::make('authors')->sortable(true),
                Text::make('title')->sortable(true),
                Text::make('locality')->sortable(true),
                Text::make('publisher')->sortable(true),
                Number::make('year')->sortable(true),
            ])->dependsOn('type', 0),

            NovaDependencyContainer::make([
                Text::make('authors')->sortable(true),
                Text::make('title')->sortable(true),
                Text::make('newspaper_name')->sortable(true),
                Text::make('year')->sortable(true),
                Text::make('pages')->sortable(true),
            ])->dependsOn('type', 1),

            NovaDependencyContainer::make([
                Text::make('Autor(es)', 'authors')->sortable(true),
                Text::make('Título', 'title')->sortable(true),
                Text::make('Título do livro','book_title')->sortable(true),
                Text::make('Autor do livro','book_author')->sortable(true),
                Text::make('Localidade','locality')->sortable(true),
                Text::make('Editora','publisher')->sortable(true),
                Text::make('Ano', 'year')->sortable(true),
                Text::make('Páginas', 'pages')->sortable(true),
            ])->dependsOn('type', 2),

            NovaDependencyContainer::make([
                Text::make('Autor(es)','authors')->sortable(true),
                Text::make('Título', 'title')->sortable(true),
                Text::make('Título do periódico', 'periodic_title')->sortable(true),

                Number::make('Ano', 'year')->sortable(true),
                Number::make('Mês', 'month')->sortable(true),
                Number::make('Dia', 'day')->sortable(true),
                Text::make('Páginas', 'pages')->sortable(true),
            ])->dependsOn('type', 3),

            NovaDependencyContainer::make([
                Text::make('Autor(es)','authors')->sortable(true),
                Text::make('Nome da página', 'title')->sortable(true),
                Text::make('Nome do Website', 'website_name')->sortable(true),
                Text::make('URL', 'url')->sortable(true),

                Number::make('Ano', 'year')->sortable(true),
                Number::make('Mês', 'month')->sortable(true),
                Number::make('Dia', 'day')->sortable(true),
            ])->dependsOn('type', 4),

        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
