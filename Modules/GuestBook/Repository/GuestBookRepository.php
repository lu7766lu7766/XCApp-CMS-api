<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/11/6
 * Time: 下午 02:21
 */

namespace Modules\GuestBook\Repository;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Collection;
use Modules\Base\Util\LaravelLoggerUtil;
use Modules\GuestBook\Entities\GuestBook;
use Modules\MorphCounter\Constants\MorphCounterConstants;

class GuestBookRepository
{
    /**
     * @param int $page
     * @param int $perpage
     * @param string $search
     * @return Collection|GuestBook[]
     */
    public function getList(int $page, int $perpage, string $search)
    {
        $query = GuestBook::query();
        if (!empty($search)) {
            $query = $query->where('title', 'like', '%' . $search . '%');
        }
        $query = $query->with([
            'counter',
            'author' => function (BelongsTo $query) {
                $query->select('id', 'account', 'display_name');
            }
        ])->withCount('comment')->orderBy('id', 'DESC');

        return $query->forPage($page, $perpage)->get();
    }

    /**
     * @param array $data
     * @return null|GuestBook
     */
    public function create(array $data)
    {
        try {
            $item = null;
            \DB::transaction(function () use ($data, &$item) {
                $orm = new GuestBook();
                $item = $orm->create($data);
                $item->incrementRecord();
            });
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $item;
    }

    /**
     * @param int $id
     * @param int $page
     * @param int $perpage
     * @return GuestBook|null
     */
    public function findFullInfo(int $id, int $page, int $perpage)
    {
        $item = GuestBook::with(
            [
                'counter',
                'author'  => function (BelongsTo $query) {
                    $query->select('id', 'account', 'display_name');
                },
                'comment' => function (MorphToMany $query) use ($page, $perpage) {
                    $query->forPage($page, $perpage);
                },
                'morphCounter',
                'accountReaction'
            ]
        )->withCount('comment')->find($id);

        return $item;
    }

    /**
     * For User 使用 剛方法被查詢時,增加閱讀次數
     * @param int $id
     * @param int $page
     * @param int $perpage
     * @return GuestBook|null
     */
    public function findFullInfoForUser(int $id, int $page, int $perpage)
    {
        $item = $this->findFullInfo($id, $page, $perpage);
        if (!is_null($item)) {
            $item->incrementRecord();
        }

        return $item;
    }

    /**
     * @param int $id
     * @param int $accountId
     * @return GuestBook|null
     */
    public function findAuthor(int $id, int $accountId)
    {
        return GuestBook::where('id', $id)->where('account_id', $accountId)->first();
    }

    /**
     * @param GuestBook $orm
     * @param array $data
     * @return bool
     */
    public function update(GuestBook $orm, array $data)
    {
        $result = false;
        try {
            $result = $orm->update($data);
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param array $ids
     * @return int
     */
    public function delete(array $ids)
    {
        try {
            $count = 0;
            \DB::transaction(function () use (&$count, $ids) {
                $items = GuestBook::whereIn('id', $ids)->get();
                $items->map(function (GuestBook $item) use (&$count) {
                    $item->deleteRecord();
                    $item->delete();
                    $count++;
                });
            });
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $count;
    }

    /**
     * @param string $search
     * @return int
     */
    public function total(string $search)
    {
        $query = GuestBook::query();
        if (!empty($search)) {
            $query->where('title', 'like', '%' . $search . '%');
        }

        return $query->count();
    }

    /**
     * @param int $id
     * @param int $accountId
     * @param string $message
     * @return GuestBook|null
     */
    public function addComment(int $id, int $accountId, string $message)
    {
        $item = GuestBook::find($id);
        if (!is_null($item)) {
            $item->addComment($accountId, $message);
        }

        return $item;
    }

    /**
     * @param int $id
     * @param int $accountId
     * @return GuestBook|null
     */
    public function like(int $id, int $accountId)
    {
        $item = GuestBook::find($id);
        if (!is_null($item)) {
            if ($item->addAccountReaction($accountId)) {
                $item->increaseMorphCounter(MorphCounterConstants::THUMBS_UP);
            }
        }

        return $item;
    }

    /**
     * @param int $id
     * @param int $accountId
     * @return GuestBook|null
     */
    public function dislike(int $id, int $accountId)
    {
        $item = GuestBook::find($id);
        if (!is_null($item)) {
            if ($item->cancelAccountReaction($accountId)) {
                $item->decreaseMorphCounter(MorphCounterConstants::THUMBS_UP);
            }
        }

        return $item;
    }
}
