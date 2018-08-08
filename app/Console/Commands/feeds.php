<?php

namespace App\Console\Commands;
use SimpleXmlElement;
use Illuminate\Console\Command;
use App\Models\startup;

class feeds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'GetFeeds';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get information in vnxpress';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $content = file_get_contents('https://vnexpress.net/rss/startup.rss');
        $x = new SimpleXmlElement($content);
        $rs = array();
        $array_update=array();

        $t=startup::all();
            foreach ($t as $item)
            {
                $rs[]=$item->link;
            }
            foreach ($x->channel->item as $entry)
            {
                $itemTitle = (string)$entry->title;

                $itemDescription = (string)$entry->description;
                $itemLink = (string)$entry->link;
                $itemCategory='startup';

                if (in_array($itemLink, $rs)) 
                {
                    echo "Khong co gi update" . "  ";
                }
                else 
                {   
                    $Home = new startup();
                    $Home->title="$itemTitle";
                    $Home->description="$itemDescription";
                    $Home->link="$itemLink";
                    $Home->Category="$itemCategory";
                    $Home->save();

               // DB::table('dl')->insert(['title' => "$itemTitle", 'description' => "$itemDescription", 'link' => "$itemLink"]);
                    $array = ['title' => $itemTitle, 'description' => $itemDescription, 'link' => $itemLink,'Category'=>$itemCategory];
                    array_push($array_update,$array);
                    echo "Thanh cong"." ";
                }
            }
        echo "<pre>";
        print_r($array_update);
        echo "</pre>";
    }
}
