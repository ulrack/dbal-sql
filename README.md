[![Build Status](https://travis-ci.com/ulrack/dbal-sql.svg?branch=master)](https://travis-ci.com/ulrack/dbal-sql)

# Ulrack DBAL SQL

Ulrack DBAL SQL provides a SQL implementation for [Ulrack DBAL](https://github.com/ulrack/dbal).
This package only implements the query assembly part.

## Installation

To install the package run the following command:

```
composer require ulrack/dbal-sql
```

## Usage

### Using filters

Some queries accept filters. Filters are used to narrow down the amount of
returned results. These filters are based on the `QueryFilterInterface` from the
`ulrack/dbal` package.

Filters can be grouped in the `QueryFilterGroup` object. All filters inside this
group are separated by an AND statement. If a query object accepts multiple filter
groups, the filter groups will be separated by an OR statement.

- [QueryFilterGroup](src/Filter/QueryFilterGroup.php): The base filter object
expected by most queries.

Filters can be added to the group after instantiation:
```php
use Ulrack\Dbal\Sql\Filter\QueryFilterGroup;
use Ulrack\Dbal\Sql\Filter\ComparatorFilter;
use Ulrack\Dbal\Sql\Common\ComparatorEnum;

// Create the filter group
$filterGroup = new QueryFilterGroup;

//Create the filter "column='value'"
$filter = new ComparatorFilter(
    'column',
    'value',
    ComparatorEnum::EQ()
);

//Add the filter
$filterGroup->addFilter($filter);
```

- [ComparatorFilter](src/Filter/ComparatorFilter.php): Compare a column to a
value with a standard comparator.
- [ExistsFilter](src/Filter/ExistsFilter.php): Adds an EXISTS statement with a
sub-query as a filter.
- [QueryInFilter](src/Filter/QueryInFilter.php): Connects a default comparator
with a sub-query as a filter.
- [QueryOperatorFilter](src/Filter/QueryOperatorFilter.php): Create a ANY or ALL
filter in combination with a comparator for a sub-query.
- [RelationalComparatorFilter](src/Filter/RelationalComparatorFilter.php): Creates
a direct value injected filter. This filter does not use a parameter, but
operates similar to the `ComparatorFilter`.

### Creating queries

Queries are created by instantiating and configuring and object, before passing
it to the connection.

#### Traits

Some queries have shared logic and thus implement common traits.

- [FilterableQueryTrait](src/Component/FilterableQueryTrait.php): This trait is
implemented by queries that support filters.
- [JoinableQueryTrait](src/Component/JoinableQueryTrait.php): This trait is
implemented by queries that support joining multiple tables in a single query.
- [PageableQueryTrait](src/Component/PageableQueryTrait.php): This trait is
implemented by queries that support paging (`LIMIT` with(out) an `OFFSET`).
- [SortableQueryTrait](src/Component/SortableQueryTrait.php): This trait is
implemented by queries that support sorting.

#### Enums

Some options and queries have a limitation in the options that can be passed to
the object. [Enums](https://github.com/ulrack/enum) are used for this.

- [ColumnAttributeEnum](src/Common/ColumnAttributeEnum.php)
- [ColumnDefaultEnum](src/Common/ColumnDefaultEnum.php)
- [ColumnTypeEnum](src/Common/ColumnTypeEnum.php)
- [ComparatorEnum](src/Common/ComparatorEnum.php)
- [IndexTypeEnum](src/Common/IndexTypeEnum.php)
- [OperatorEnum](src/Common/OperatorEnum.php)
- [ShowTypeEnum](src/Common/ShowTypeEnum.php)
- [UnionEnum](src/Common/UnionEnum.php)

#### Queries

The queries are sorted by their affecting goal. There are also a few standard
queries which don't fit in any category.

- [BatchQuery](src/Query/BatchQuery.php): Joins multiple queries for a single
line execution.
- [RawQuery](src/Query/RawQuery.php): If none of the query object fit the bill,
this object can be used to execute a custom query.

##### Context

- [ShowQuery](src/Query/Context/ShowQuery.php)
- [UseQuery](src/Query/Context/UseQuery.php)

##### Data

- [DeleteQuery](src/Query/Data/DeleteQuery.php)
- [InsertIntoSelectQuery](src/Query/Data/InsertIntoSelectQuery.php)
- [InsertQuery](src/Query/Data/InsertQuery.php)
- [SelectIntoQuery](src/Query/Data/SelectIntoQuery.php)
- [SelectQuery](src/Query/Data/SelectQuery.php)
- [UnionQuery](src/Query/Data/UnionQuery.php)
- [UpdateQuery](src/Query/Data/UpdateQuery.php)

##### Database

- [AlterDatabaseQuery](src/Query/Database/AlterDatabaseQuery.php)
- [BackupDatabaseQuery](src/Query/Database/BackupDatabaseQuery.php)
- [CreateDatabaseQuery](src/Query/Database/CreateDatabaseQuery.php)
- [DropDatabaseQuery](src/Query/Database/DropDatabaseQuery.php)

##### Table

- [AbstractTableQuery](src/Query/Table/AbstractTableQuery.php): Forms the base
for the other table queries.
- [AlterTableQuery](src/Query/Table/AlterTableQuery.php)
- [CreateTableQuery](src/Query/Table/CreateTableQuery.php)
- [DropTableQuery](src/Query/Table/DropTableQuery.php)

##### View

- [CreateOrReplaceViewQuery](src/Query/View/CreateOrReplaceViewQuery.php)
- [CreateViewQuery](src/Query/View/CreateViewQuery.php)
- [DropViewQuery](src/Query/View/DropViewQuery.php)

##### Index

- [CreateIndexQuery](src/Query/Index/CreateIndexQuery)
- [DropIndexQuery](src/Query/Index/DropIndexQuery)

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## MIT License

Copyright (c) 2019 Jyxon

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
