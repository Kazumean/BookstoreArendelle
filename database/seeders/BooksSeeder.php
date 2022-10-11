<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('books')->insert ([
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'name' => '神様のボート',
                'author_name' => '江國香織',
                'category_id' => 1,
                'description' => '昔、ママは、骨ごと溶けるような恋をし、その結果あたしが生まれた。「私の宝物は三つ。ピアノ。あのひと。そしてあなたよ草子。」必ず戻るといって消えたパパを待ってママとあたしは引越しを繰り返す。「私はあのひとのいない場所にはなじむわけにいかないの」「神様のボートにのってしまったから」――恋愛の静かな狂気に囚われた母葉子と、その傍らで成長していく娘草子の遥かな旅の物語。',
                'country_id' => 203,
                'price_data' => 550,
                'price_paperbook' => 605,
                'image_path' => 'kamisamano-boat.jpg',
                'deleted' => false,
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'name' => 'Alice in Wonderland',
                'author_name' => 'Lewis Carroll',
                'category_id' => 1,
                'description' => '幼い少女アリスが白ウサギを追いかけて不思議の国に迷い込み、しゃべる動物や動くトランプなどさまざまなキャラクターたちと出会いながらその世界を冒険する。',
                'country_id' => 25,
                'price_data' => 1300,
                'price_paperbook' => 1695,
                'image_path' => 'alice-in-wonderland.jpg',
                'deleted' => false,
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'name' => 'The Catcher in the Rye',
                'author_name' => 'J.D.Salinger',
                'category_id' => 1,
                'description' => '純真無垢な人こそ社会に適応できない。孤独と絶望、そして世界に対する不信感…思春期の青年が悩み苦しむその背景に何があるのか。そして彷徨う心を持て余した彼が最後に出した結論とは？幼い妹や亡くなった弟に愛情を注ぐ一方で、繊細過ぎるその性格は多種多様な人が集まり、様々な思考を持つ人々が交差する都市では生きづらいだろうと思う。16歳のホールデンは名門校を退学になり寮を追い出され、家には帰りづらく、家出を決意。人の矛盾に気付きながら、人恋しさに積極的に関わろうとしていく彼の葛藤を荒んだ心情と相反する本音から読み解く。',
                'country_id' => 5,
                'price_data' => 1000,
                'price_paperbook' => 2356,
                'image_path' => 'the-catcher-in-the-rye.jpg',
                'deleted' => false,
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'name' => 'Gone with the Wind',
                'author_name' => 'Margaret Mitchell',
                'category_id' => 1,
                'description' => '19世紀半ば、アメリカ南部ジョージア州の大農園の娘として育った、スカーレット・オハラが主人公。黒人奴隷たちにかしずかれ、生気あふれる魅力で男たちを骨抜きにしていたが、南北戦争が勃発。激動の戦中、戦後を、浅ましいまでの現実主義、荒々しいまでの生命力で生き抜いていく。',
                'country_id' => 5,
                'price_data' => 284,
                'price_paperbook' => 1947,
                'image_path' => 'gone-with-the-wind.jpg',
                'deleted' => false,
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'name' => 'Matilda',
                'author_name' => 'Roald Dahl',
                'category_id' => 1,
                'description' => '４才ちょっとで図書館の本を読破しちゃった、天才少女マチルダ。ところが両親ときたら、そんな娘を「かさぶた」あつかい。学校にあがると、凶暴な女校長がいて、生徒たちを痛めつけている。横暴で悪どい大人たちに頭脳で立ち向かうマチルダの、痛快な仕返し大作戦！',
                'country_id' => 25,
                'price_data' => 1126,
                'price_paperbook' => 1418,
                'image_path' => 'matilda.jpg',
                'deleted' => false,
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'name' => 'そして、バトンは渡された',
                'author_name' => '瀬尾まいこ',
                'category_id' => 1,
                'description' => '血の繋がらない親に育てられた森宮優子は、料理上手な義理の父とふたりで暮らし、将来や友人関係に悩んでいた。その一方で、夫を何度も変えて来た梨花は、愛娘を置いて姿を消した。ある日、優子に届いた一通の手紙をきっかけに、ふたりの物語が交差していく。',
                'country_id' => 203,
                'price_data' => 950,
                'price_paperbook' => 990,
                'image_path' => 'soshite-baton-ha-watasareta.jpg',
                'deleted' => false,
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'name' => '発酵は冷蔵庫におまかせ！　子どもと作れる12か月のパン',
                'author_name' => '吉永麻衣子',
                'category_id' => 9,
                'description' => '生地をこねるのはちょっと、冷蔵庫で寝かせるだけ。オーブントースターで焼けるから、子どもにも初心者にもピッタリ。1月の「十二支パン」から、3月の「おひなさまパン」、5月の「こいのぼりパン」、9月の「お月見パン」、12月の「クリスマスパン」まで、月ごとに季節の行事や旬の素材を盛りこんだ簡単レシピが満載。',
                'country_id' => 203,
                'price_data' => 1500,
                'price_paperbook' => 1760,
                'image_path' => 'hakko-ha-omakase.jpg',
                'deleted' => false,
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'name' => 'セレナーデ',
                'author_name' => 'Uru',
                'category_id' => 1,
                'description' => '幸せだった日々にしがみ付いたまま、今を生きていないのは僕のほうだ── シンガーUruが自身の楽曲をもとに描く、脆くて眩しい3つの物語。',
                'country_id' => 203,
                'price_data' => 1584,
                'price_paperbook' => 1760,
                'image_path' => 'serenade.jpg',
                'deleted' => false,
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'name' => 'フィンランドの教育はなぜ世界一なのか',
                'author_name' => '岩竹美加子',
                'category_id' => 2,
                'description' => '人口約550万人、小国ながらもPISA（一五歳児童の学習到達度国際比較）で、多分野において1位を獲得、近年は幸福度も世界一となったフィンランド。その教育を我が子に受けさせてみたら、入学式も、運動会も、テストも、制服も、部活も、偏差値もなかった。小学校から大学まで無償、シンプルで合理的な制度、人生観を育む独特の授業……AI時代に対応した理想的な教育の姿を示す。',
                'country_id' => 203,
                'price_data' => 772,
                'price_paperbook' => 902,
                'image_path' => 'Finland-no-kyouiku-ha-nazesekaiichinanoka.jpg',
                'deleted' => false,
            ],
        ]);
    }
}
