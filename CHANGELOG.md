# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## 3.0.2 - 2020-04-09
### Changed
- Changed enum package to GrizzIT variation.

## 3.0.1 - 2020-03-05
### Changed
- Changed company name references.

## 3.0.0 - 2019-11-10
### Changed
- Unified namespace conventions used across packages

## 2.0.1 - 2019-05-06
### Fixed
- Spacing of some queries.

## 2.0.0 - 2019-05-02
### Added
- `Ulrack\Dbal\Sql\Query\Index\CreateIndexQuery`
- `Ulrack\Dbal\Sql\Query\Index\DropIndexQuery`

### Changed
- Enums to not include the name of the enum.
- Fixed old references.
- Fixed tests.

### Fixed
- `CreateTableQuery` and `AlterTableQuery` output.

## 1.0.0 - 2019-05-02
### Added
- `Ulrack\Dbal\Sql\Common\ColumnAttributeEnum`
- `Ulrack\Dbal\Sql\Common\ColumnDefaultEnum`
- `Ulrack\Dbal\Sql\Common\ColumnTypeEnum`
- `Ulrack\Dbal\Sql\Common\ComparatorEnum`
- `Ulrack\Dbal\Sql\Common\IndexTypeEnum`
- `Ulrack\Dbal\Sql\Common\OperatorEnum`
- `Ulrack\Dbal\Sql\Common\ShowTypeEnum`
- `Ulrack\Dbal\Sql\Common\UnionEnum`
- `Ulrack\Dbal\Sql\Component\FilterableQueryTrait`
- `Ulrack\Dbal\Sql\Component\JoinableQueryTrait`
- `Ulrack\Dbal\Sql\Component\PageableQueryTrait`
- `Ulrack\Dbal\Sql\Component\SortableQueryTrait`
- `Ulrack\Dbal\Sql\Filter\ComparatorFilter`
- `Ulrack\Dbal\Sql\Filter\ExistsFilter`
- `Ulrack\Dbal\Sql\Filter\QueryFilterGroup`
- `Ulrack\Dbal\Sql\Filter\QueryInFilter`
- `Ulrack\Dbal\Sql\Filter\QueryOperatorFilter`
- `Ulrack\Dbal\Sql\Filter\RelationalComparatorFilter`
- `Ulrack\Dbal\Sql\Query\BatchQuery`
- `Ulrack\Dbal\Sql\Query\RawQuery`
- `Ulrack\Dbal\Sql\Query\Context\ShowQuery`
- `Ulrack\Dbal\Sql\Query\Context\UseQuery`
- `Ulrack\Dbal\Sql\Query\Data\DeleteQuery`
- `Ulrack\Dbal\Sql\Query\Data\InsertIntoSelectQuery`
- `Ulrack\Dbal\Sql\Query\Data\InsertQuery`
- `Ulrack\Dbal\Sql\Query\Data\SelectIntoQuery`
- `Ulrack\Dbal\Sql\Query\Data\SelectQuery`
- `Ulrack\Dbal\Sql\Query\Data\UnionQuery`
- `Ulrack\Dbal\Sql\Query\Data\UpdateQuery`
- `Ulrack\Dbal\Sql\Query\Database\AlterDatabaseQuery`
- `Ulrack\Dbal\Sql\Query\Database\BackupDatabaseQuery`
- `Ulrack\Dbal\Sql\Query\Database\CreateDatabaseQuery`
- `Ulrack\Dbal\Sql\Query\Database\DropDatabaseQuery`
- `Ulrack\Dbal\Sql\Query\Table\AbstractTableQuery`
- `Ulrack\Dbal\Sql\Query\Table\AlterTableQuery`
- `Ulrack\Dbal\Sql\Query\Table\CreateTableQuery`
- `Ulrack\Dbal\Sql\Query\Table\DropTableQuery`
- `Ulrack\Dbal\Sql\Query\View\CreateOrReplaceViewQuery`
- `Ulrack\Dbal\Sql\Query\View\CreateViewQuery`
- `Ulrack\Dbal\Sql\Query\View\DropViewQuery`

[Unreleased](https://github.com/ulrack/dbal-sql/compare/3.0.2...HEAD)

[3.0.2](https://github.com/ulrack/dbal-sql/compare/3.0.1...3.0.2)

[3.0.1](https://github.com/ulrack/dbal-sql/compare/3.0.0...3.0.1)

[3.0.0](https://github.com/ulrack/dbal-sql/compare/2.0.1...3.0.0)

[2.0.1](https://github.com/ulrack/dbal-sql/compare/2.0.0...2.0.1)

[2.0.0](https://github.com/ulrack/dbal-sql/compare/1.0.0...2.0.0)
