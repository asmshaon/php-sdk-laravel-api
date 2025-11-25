<?php

namespace SDKAbuAPI;

use Psr\Http\Message\ResponseInterface;
use SDKAbuAPI\Core\Attributes\Api;
use SDKAbuAPI\Core\Concerns\SdkModel;
use SDKAbuAPI\Core\Concerns\SdkPage;
use SDKAbuAPI\Core\Contracts\BaseModel;
use SDKAbuAPI\Core\Contracts\BasePage;
use SDKAbuAPI\Core\Conversion;
use SDKAbuAPI\Core\Conversion\Contracts\Converter;
use SDKAbuAPI\Core\Conversion\Contracts\ConverterSource;
use SDKAbuAPI\Core\Conversion\ListOf;
use SDKAbuAPI\Core\Util;

/**
 * @phpstan-type CursorPageShape = array{
 *   data?: list<mixed>|null, next_cursor?: string|null
 * }
 *
 * @template TItem
 *
 * @implements BasePage<TItem>
 */
final class CursorPage implements BaseModel, BasePage
{
    /** @use SdkModel<CursorPageShape> */
    use SdkModel;

    /** @use SdkPage<TItem> */
    use SdkPage;

    /** @var list<TItem>|null $data */
    #[Api(list: 'mixed', optional: true)]
    public ?array $data;

    #[Api(nullable: true, optional: true)]
    public ?string $next_cursor;

    /**
     * @internal
     *
     * @param array{
     *   method: string,
     *   path: string,
     *   query: array<string,mixed>,
     *   headers: array<string,string|list<string>|null>,
     *   body: mixed,
     * } $request
     */
    public function __construct(
        private string|Converter|ConverterSource $convert,
        private Client $client,
        private array $request,
        private RequestOptions $options,
        ResponseInterface $response,
    ) {
        $this->initialize();

        $data = Util::decodeContent($response);

        if (!is_array($data)) {
            return;
        }

        // @phpstan-ignore-next-line
        self::__unserialize($data);

        if ($this->offsetExists('data')) {
            $acc = Conversion::coerce(
                new ListOf($convert),
                value: $this->offsetGet('data')
            );
            // @phpstan-ignore-next-line
            $this->offsetSet('data', $acc);
        }
    }

    /** @return list<TItem> */
    public function getItems(): array
    {
        // @phpstan-ignore-next-line
        return $this->offsetGet('data') ?? [];
    }

    /**
     * @internal
     *
     * @return array{
     *   array{
     *     method: string,
     *     path: string,
     *     query: array<string,mixed>,
     *     headers: array<string,string|list<string>|null>,
     *     body: mixed,
     *   },
     *   RequestOptions,
     * }|null
     */
    public function nextRequest(): ?array
    {
        $next = $this->next_cursor ?? null;
        if (!$next) {
            return null;
        }

        $nextRequest = array_merge_recursive(
            $this->request,
            ['query' => ['cursor' => $next]]
        );

        // @phpstan-ignore-next-line
        return [$nextRequest, $this->options];
    }
}
