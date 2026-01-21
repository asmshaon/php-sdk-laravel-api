# Changelog

## 0.1.0 (2026-01-21)

Full Changelog: [v0.0.1...v0.1.0](https://github.com/asmshaon/php-sdk-laravel-api/compare/v0.0.1...v0.1.0)

### ⚠ BREAKING CHANGES

* replace special flag type `omittable` with just `null`
* use aliases for phpstan types
* use camel casing for all class properties

### Features

* add `BaseResponse` class for accessing raw responses ([6b0faef](https://github.com/asmshaon/php-sdk-laravel-api/commit/6b0faef6967fbdae937f0070366fea318c57bab8))
* add idempotency header support ([a1ae323](https://github.com/asmshaon/php-sdk-laravel-api/commit/a1ae32339d50c3f8c7b733e5bd0618f157a97fa5))
* allow both model class instances and arrays in setters ([f6c9925](https://github.com/asmshaon/php-sdk-laravel-api/commit/f6c992576070272768b75fa2bc1441ca22a4b33c))
* **api:** manual updates ([94434a1](https://github.com/asmshaon/php-sdk-laravel-api/commit/94434a12b8a87d7d66377de6a74cc7bc00f5e80f))
* **api:** manual updates ([8838bd1](https://github.com/asmshaon/php-sdk-laravel-api/commit/8838bd1113963ecc10e510211131c7c2e24ee26e))
* replace special flag type `omittable` with just `null` ([c25c088](https://github.com/asmshaon/php-sdk-laravel-api/commit/c25c088c13b3bd1fb3613dad1203610e53510081))
* simplify and make the phpstan types more consistent ([285f6e9](https://github.com/asmshaon/php-sdk-laravel-api/commit/285f6e9a9926253ced0b0c195980cdf74d0f5a46))
* split out services into normal & raw types ([ddf3904](https://github.com/asmshaon/php-sdk-laravel-api/commit/ddf3904fd62f202debdf2071fbec3dc1675ff661))
* support unwrapping envelopes ([642c67f](https://github.com/asmshaon/php-sdk-laravel-api/commit/642c67f330713a879fe1ce0648da40242ec92b8a))
* use aliases for phpstan types ([99d34b1](https://github.com/asmshaon/php-sdk-laravel-api/commit/99d34b1033788db72f6164ca8411d04821ab2c08))
* use camel casing for all class properties ([655f4cb](https://github.com/asmshaon/php-sdk-laravel-api/commit/655f4cb1c9b2743918cdb9c55601692b6a03c29c))


### Bug Fixes

* a number of serialization errors ([9cbdb0e](https://github.com/asmshaon/php-sdk-laravel-api/commit/9cbdb0eec3a849e68f6d8dcf0c2466b3ade42bde))
* correctly serialize dates ([3427030](https://github.com/asmshaon/php-sdk-laravel-api/commit/3427030ce64692e30f8c135d74ed96f892475893))
* support arrays in query param construction ([108f718](https://github.com/asmshaon/php-sdk-laravel-api/commit/108f718170a399d1382966d11b3693760b2714e8))
* typos in README.md ([24d3185](https://github.com/asmshaon/php-sdk-laravel-api/commit/24d31851d345ae4d2b20730a484de92e80de10ec))


### Chores

* add git attributes and composer lock file ([4f8d610](https://github.com/asmshaon/php-sdk-laravel-api/commit/4f8d610e869a8c518bf165a484f1850bfb356b05))
* be more targeted in suppressing superfluous linter warnings ([a13cbeb](https://github.com/asmshaon/php-sdk-laravel-api/commit/a13cbeb96bbdca4b886536156403deafc9b081f9))
* formatting ([c9892d7](https://github.com/asmshaon/php-sdk-laravel-api/commit/c9892d7a8466d75ffdff76aabf252c1023df6920))
* **internal:** add a basic client test ([3c221b3](https://github.com/asmshaon/php-sdk-laravel-api/commit/3c221b3484bc79515c9dfb32471a7bf2aec0304e))
* **internal:** codegen related update ([363b451](https://github.com/asmshaon/php-sdk-laravel-api/commit/363b4513cafc9c2e190700fc7f006990e86f9acf))
* **internal:** codegen related update ([22f12e0](https://github.com/asmshaon/php-sdk-laravel-api/commit/22f12e09dc30de0b1ad44b4a1785b944864a5d56))
* **internal:** codegen related update ([39a1978](https://github.com/asmshaon/php-sdk-laravel-api/commit/39a19788d9775c5cdd34ee945960b65b5bf47ade))
* **internal:** codegen related update ([e4a635d](https://github.com/asmshaon/php-sdk-laravel-api/commit/e4a635d4f11fd692bf8da9cea97f5f3c31db6516))
* **internal:** codegen related update ([3c9e4ce](https://github.com/asmshaon/php-sdk-laravel-api/commit/3c9e4ce860affe3b525c117b79f5727c0ad98c6a))
* **internal:** codegen related update ([7c63ec6](https://github.com/asmshaon/php-sdk-laravel-api/commit/7c63ec6c5dbc749a43e65c142cf2f4c9b0aacb5a))
* **internal:** codegen related update ([87eeef4](https://github.com/asmshaon/php-sdk-laravel-api/commit/87eeef4e473755dec56902faab1f03b09ace8016))
* **internal:** codegen related update ([e2aa93d](https://github.com/asmshaon/php-sdk-laravel-api/commit/e2aa93d27ab68bfc62eaddeb0cefbd68a8a52d38))
* **internal:** codegen related update ([eac5968](https://github.com/asmshaon/php-sdk-laravel-api/commit/eac5968b40e4d7717d20af72a5931131b9bee4a2))
* **internal:** codegen related update ([e2a53bf](https://github.com/asmshaon/php-sdk-laravel-api/commit/e2a53bf038c05ed3cf98e9a679923140564c4956))
* **internal:** codegen related update ([78ebd0b](https://github.com/asmshaon/php-sdk-laravel-api/commit/78ebd0b515df45fa3d4a619a86b82fcf79bd081c))
* **internal:** minor test script reformatting ([cac07bd](https://github.com/asmshaon/php-sdk-laravel-api/commit/cac07bd3d3fc6ef97fd2d8d38a2e6d8b352b5c48))
* **internal:** refactor auth by moving concern from base client into client ([f173bba](https://github.com/asmshaon/php-sdk-laravel-api/commit/f173bbaccf5ad4f6ddce46337637ac522681b0db))
* **internal:** update `actions/checkout` version ([c3b609b](https://github.com/asmshaon/php-sdk-laravel-api/commit/c3b609bb0f30a658e0a592ae60418c74c485a92c))
* **internal:** update phpstan comments ([d5d8cb4](https://github.com/asmshaon/php-sdk-laravel-api/commit/d5d8cb4ed9f2631bb032d0694946c9b47f163a5b))
* **readme:** remove beta warning now that we're in ga ([8e3a266](https://github.com/asmshaon/php-sdk-laravel-api/commit/8e3a26658be57f16c3fbc1fc2252032ab468aaf6))
* switch from `#[Api(optional: true|false)]` to `#[Required]|#[Optional]` for annotations ([33b23a2](https://github.com/asmshaon/php-sdk-laravel-api/commit/33b23a2ed2a38052457f536343868790cd03407f))
* update SDK settings ([37fbcf7](https://github.com/asmshaon/php-sdk-laravel-api/commit/37fbcf7addd52d7c0fc6c0b32fa720d13856b73e))
* use `$self = clone $this;` instead of `$obj = clone $this;` ([494c8d0](https://github.com/asmshaon/php-sdk-laravel-api/commit/494c8d0d3f9e9e0dee3a5fb06707b26e89ccae0c))
* use non-trivial test assertions ([892a509](https://github.com/asmshaon/php-sdk-laravel-api/commit/892a50957a6d3a7292d40acf01892f6c5144d66f))
* use single quote strings ([4230890](https://github.com/asmshaon/php-sdk-laravel-api/commit/4230890db4fab1b95f4c0d45cbcaae735ecf2aa2))
