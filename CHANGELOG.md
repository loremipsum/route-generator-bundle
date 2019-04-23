# RouteGeneratorBundle Changelog

## [Unreleased 0.3.0]
### Change
- **BC-BREAK** Set supported php version to ^7.1
- **BC-BREAK** Move RouteGenerator to Utils namespace
- **BC-BREAK** Move RouteGeneratorInterface to Model namespace
- **BC-BREAK** Move RouteHandlerInterface to Model namespace

## [0.2.0] - 2019-04-23
### Add
- Support route $referenceType (defaults to `UrlGeneratorInterface::ABSOLUTE_PATH`)

### Change
- **BC-BREAK** Change interface RouteHandlerInterface and RouteGeneratorInterface to support $referenceType

## [0.1.3] - 2018-12-27
### Fix
- Fix possible string conversion error when using routable

## [0.1.2] - 2018-11-08
### Added
- twig: Add routable test

## [0.1.1] - 2018-10-30
### Added
- DI: Add autoconfiguration for RouteHandlerInterface implementations

## [0.1.0] - 2018-10-02
### Added
- Initial version
