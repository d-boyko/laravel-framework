<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DiggingDeeperController extends Controller
{
    public function collections()
    {
        $result = [];
        $eloquentCollection = User::withTrashed()->get();

//        $collection = collect();
//        dd($collection);
//        dd(__METHOD__, $eloquentCollection, $eloquentCollection->toArray());

        $collection = collect($eloquentCollection->toArray());

        $result['first'] = $collection->first();
        $result['last'] = $collection->last();
        $result['where']['data'] = $collection
            ->where('name', '=', 'Adonis Herzog') // where condition
            ->values() // get only values from collection
            ->keyBy('id'); // the key will be equal to id from collection

        $result['where']['count'] = $result['where']['data']
            ->count(); // count of collection items

        $result['where']['isEmpty'] = $result['where']['data']
            ->isEmpty(); // is collection empty?

        $result['where']['isNotEmpty'] = $result['where']['data']
            ->isNotEmpty(); // is collection not empty?

        $result['where']['first'] = $collection
            ->firstWhere('created_at', '>', '2022-09-01 01:15:58'); // get the first value from collection with condition

        // the base value won't be changed, just new value will be returned
        $result['map'] = $collection->map(function (array $element) {
            return [$element['name'], $element['email']];
        }); // re-mapping some collection


        $defaultCollection = collect(User::all()->toArray());

//        $defaultCollection->transform(function (array $item) {
//           return [
//               'id' => $item['id'],
//               'name' => $item['name'],
//               'email' => $item['email'],
//               'created_at' => $item['created_at']
//           ];
//        });

        // Instead Of orWhere, because method OrWhere doesn't exist in collections
        $filteredCollection = $defaultCollection->filter(function ($item) {
            return
                ($item['email'] == 'abagail.conroy@example.com') ||
                ($item['email'] == 'xmurray@example.net');
        })->keyBy('id'); //

        $chunkedCollection = collect([1,2,3,4,5,6,7,8,9,10]);
        $chunks = $chunkedCollection->chunk(4);

        dd($filteredCollection, $chunks, $chunks[0], $chunks[0][2]);

        // SOME METHODS
        // prepend - add some item and change to the first position of collection
        // push - add some item and change to the last position of collection
        // pull - take some element from the collection, the element will be removed from collection

        dd($result, $defaultCollection);

        dd(
            get_class($eloquentCollection),
            get_class($collection),
            $collection
        );
    }
}
