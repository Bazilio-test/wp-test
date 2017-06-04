<?php

/**
 * Populating with demo data
 * The function is executed upon activation
 */
function populate_demo_data(){
	global $movies_meta_fields;  // Обозначим наш массив с полями глобальным
	global $wpdb;

	//populate data for taxonomy "taxgenres"
	$genres = ['action', 'adventure', 'anime', 'biography', 'cartoon', 'children`s',
		'comedy', 'crime', 'detective', 'documentary', 'drama', 'eroticism',
		'family', 'fantasy', 'horror', 'melodrama', 'music', 'musical', 'mystic',
		'post-apocalyptic', 'reality show', 'scientific', 'sci-fi', 'short film',
		'sport', 'thriller', 'war', 'western', 'historical'];
	foreach($genres as $genre){
		$res = wp_insert_term($genre, 'taxgenres', ['slug' => toSlug($genre)]);
	}

	//populate data for taxonomy "taxcountries"
	$countries = ['Australia', 'Austria', 'Azerbaijan', 'Albania', 'Algeria', 'Argentina', 'Armenia',
		'Afghanistan', 'Belarus', 'Belgium', 'Bulgaria', 'Bolivia', 'Bosnia and Herzegovina', 'Brazil',
		'United Kingdom', 'Hungary', 'Venezuela', 'Viet Nam', 'Germany', 'Hong Kong', 'Greenland',
		'Greece', 'Georgia', 'Denmark', 'Egypt', 'Israel', 'India', 'Indonesia', 'Jordan', 'Iraq',
		'Iran', 'Ireland', 'Iceland', 'Spain', 'Italy', 'Kazakhstan', 'Cambodia', 'Canada', 'Qatar',
		'Cyprus', 'KDPR', 'China', 'Colombia', 'Korea', 'Cuba', 'Latvia', 'Lebanon', 'Libya', 'Lithuania',
		'Macedonia', 'Morocco', 'Mexico', 'Moldova', 'Monaco', 'Mongolia', 'Nepal', 'Nigeria',
		'Netherlands', 'Nicaragua', 'New Zealand', 'Norway', 'United Arab Emirates', 'Pakistan',
		'Paraguay', 'Peru', 'Poland', 'Portugal', 'Russian Federation', 'Romania', 'El Salvador',
		'Saudi Arabia', 'Senegal', 'Serbia', 'Singapore', 'Syrian Arab Republic', 'Slovakia',
		'Slovenia', 'United States', 'Tajikistan', 'Thailand', 'Tuvalu', 'Tunisia', 'Turkmenistan',
		'Turkey', 'Uganda', 'Uzbekistan', 'Ukraine', 'USA', 'Philippines', 'Finland', 'France',
		'Croatia', 'Montenegro', 'Czech Republic', 'Chile', 'Switzerland', 'Sweden',
		'Ecuador', 'Estonia', 'Japan'];
	foreach($countries as $country){
		$res = wp_insert_term($country, 'taxcountries', ['slug' => toSlug($country)]);
	}

	//populate data for taxonomy "taxyears"
	for($y = 1920; $y < 2020; $y++){
		$res = wp_insert_term($y, 'taxyears', ['slug' => $y]);
	}

	//populate data for post type "movies"
	$films = [
		['name' => 'Бойцовский клуб', 'year' => 1999, 'release' => '1999-08-14', 'country' => 'США', 'price' => 360, 'genres' => ['триллер', 'драма', 'криминал'], 'actors' => ['Эдвард Нортон', 'Брэд Питт', 'Хелена Бонем Картер', 'Мит Лоаф', 'Зэк Гренье', 'Холт МакКэллани'], 'content' => 'Терзаемый хронической бессонницей и отчаянно пытающийся вырваться из мучительно скучной жизни, клерк встречает некоего Тайлера Дардена, харизматического торговца мылом с извращенной философией. Тайлер уверен, что самосовершенствование — удел слабых, а саморазрушение — единственное, ради чего стоит жить.

Пройдет немного времени, и вот уже главные герои лупят друг друга почем зря на стоянке перед баром, и очищающий мордобой доставляет им высшее блаженство. Приобщая других мужчин к простым радостям физической жестокости, они основывают тайный Бойцовский Клуб, который имеет огромный успех. Но в концовке фильма всех ждет шокирующее открытие, которое может привести к непредсказуемым событиям…'],
		['name' => 'Жизнь прекрасна', 'year' => 1997, 'release' => '1997-02-02', 'country' => 'Италия ', 'price' => 290, 'genres' => ['драма', 'мелодрама', 'комедия', 'военный'], 'actors' => ['Роберто Бениньи', 'Николетта Браски', 'Джорджио Кантарини', 'Джустино Дурано', 'Серджио Бини Бустрик', 'Мариса Паредес'], 'content' => 'Во время II Мировой войны в Италии в концлагерь были отправлены евреи, отец и его маленький сын. Жена, итальянка, добровольно последовала вслед за ними. В лагере отец сказал сыну, что все происходящее вокруг является очень большой игрой за приз в настоящий танк, который достанется тому мальчику, который сможет не попасться на глаза надзирателям. Он сделал все, чтобы сын поверил в игру и остался жив, прячась в бараке.'],
		['name' => 'Зеленая миля', 'year' => 1999, 'release' => '1999-05-24', 'country' => 'США', 'price' => 360, 'genres' => ['фэнтези', 'драма', 'криминал', 'детектив'], 'actors' => ['Том Хэнкс', 'Дэвид Морс', 'Майкл Кларк Дункан', 'Бонни Хант', 'Джеймс Кромуэлл'], 'content' => 'Обвиненный в страшном преступлении, Джон Коффи оказывается в блоке смертников тюрьмы «Холодная гора». Вновь прибывший обладал поразительным ростом и был пугающе спокоен, что, впрочем, никак не влияло на отношение к нему начальника блока Пола Эджкомба, привыкшего исполнять приговор. Гигант удивил всех позже, когда выяснилось, что он обладает невероятной магической силой…'],
		['name' => 'Как приручить дракона', 'year' => 2010, 'release' => '2010-06-07', 'country' => 'США', 'price' => 400, 'genres' => ['мультфильм', 'фэнтези', 'комедия', 'приключения', 'семейный'], 'actors' => ['Джей Барушель', 'Джерард Батлер', 'Крэйг Фергюсон', 'Америка Феррера', 'Джона Хилл', 'Кристофер Минц-Плассе'], 'content' => 'Вы узнаете историю подростка Иккинга, которому не слишком близки традиции его героического племени, много лет ведущего войну с драконами. Мир Иккинга переворачивается с ног на голову, когда он неожиданно встречает дракона Беззубика, который поможет ему и другим викингам увидеть привычный мир с совершенно другой стороны…'],
		['name' => 'Король Лев', 'year' => 1994, 'release' => '1994-12-01', 'country' => 'США', 'price' => 380, 'genres' => ['мультфильм', 'мюзикл', 'драма', 'приключения', 'семейный'], 'actors' => ['Мэттью Бродерик', 'Джереми Айронс', 'Нэйтан Лейн', 'Эрни Сабелла', 'Джеймс Эрл Джонс'], 'content' => 'У величественного Короля-Льва Муфасы рождается наследник по имени Симба. Уже в детстве любознательный малыш становится жертвой интриг своего завистливого дяди Шрама, мечтающего о власти.

Симба познаёт горе утраты, предательство и изгнание, но в конце концов обретает верных друзей и находит любимую. Закалённый испытаниями, он в нелёгкой борьбе отвоёвывает своё законное место в «Круге жизни», осознав, что значит быть настоящим Королём.'],
		['name' => 'Леон', 'year' => 1994, 'release' => '1994-10-04', 'country' => 'Франция', 'price' => 270, 'genres' => ['триллер', 'драма', 'криминал'], 'actors' => ['Жан Рено', 'Гари Олдман', 'Натали Портман', 'Дэнни Айелло', 'Майкл Бадалукко', 'Эллен Грин'], 'content' => 'Профессиональный убийца Леон, не знающий пощады и жалости, знакомится со своей очаровательной соседкой Матильдой, семью которой расстреливают полицейские, замешанные в торговле наркотиками. Благодаря этому знакомству он впервые испытывает чувство любви, но…'],
		['name' => 'Начало', 'year' => 2010, 'release' => '2010-02-11', 'country' => 'США', 'price' => 400, 'genres' => ['фантастика', 'боевик', 'триллер', 'драма', 'детектив'], 'actors' => ['Леонардо ДиКаприо', 'Джозеф Гордон-Левитт', 'Эллен Пейдж', 'Том Харди', 'Кен Ватанабе', 'Киллиан Мёрфи'], 'content' => 'Кобб — талантливый вор, лучший из лучших в опасном искусстве извлечения: он крадет ценные секреты из глубин подсознания во время сна, когда человеческий разум наиболее уязвим. Редкие способности Кобба сделали его ценным игроком в привычном к предательству мире промышленного шпионажа, но они же превратили его в извечного беглеца и лишили всего, что он когда-либо любил.

И вот у Кобба появляется шанс исправить ошибки. Его последнее дело может вернуть все назад, но для этого ему нужно совершить невозможное — инициацию. Вместо идеальной кражи Кобб и его команда спецов должны будут провернуть обратное. Теперь их задача — не украсть идею, а внедрить ее. Если у них получится, это и станет идеальным преступлением.

Но никакое планирование или мастерство не могут подготовить команду к встрече с опасным противником, который, кажется, предугадывает каждый их ход. Врагом, увидеть которого мог бы лишь Кобб.'],
		['name' => 'Побег из Шоушенка', 'year' => 1994, 'release' => '1994-03-18', 'country' => 'США', 'price' => 450, 'genres' => ['драма', 'криминал'], 'actors' => ['Тим Роббинс', 'Морган Фриман', 'Боб Гантон', 'Уильям Сэдлер', 'Клэнси Браун', 'Джил Беллоуз', 'Марк Ролстон'], 'content' => 'Успешный банкир Энди Дюфрейн обвинен в убийстве собственной жены и ее любовника. Оказавшись в тюрьме под названием Шоушенк, он сталкивается с жестокостью и беззаконием, царящими по обе стороны решетки. Каждый, кто попадает в эти стены, становится их рабом до конца жизни. Но Энди, вооруженный живым умом и доброй душой, отказывается мириться с приговором судьбы и начинает разрабатывать невероятно дерзкий план своего освобождения.'],
		['name' => 'Список Шиндлера', 'year' => 1993, 'release' => '1993-03-08', 'country' => 'США', 'price' => 270, 'genres' => ['драма', 'биографический'], 'actors' => ['Лиам Нисон', 'Бен Кингсли', 'Рэйф Файнс', 'Кэролайн Гудолл', 'Эмбет Дэвидц', 'Йонатан Сэгаль'], 'content' => 'Фильм рассказывает реальную историю загадочного Оскара Шиндлера, члена нацистской партии, преуспевающего фабриканта, спасшего во время Второй мировой войны почти 1200 евреев.'],
		['name' => 'Форрест Гамп', 'year' => 1994, 'release' => '1994-06-15', 'country' => 'США', 'price' => 300, 'genres' => ['драма', 'мелодрама', 'комедия'], 'actors' => ['Том Хэнкс', 'Робин Райт', 'Гэри Синиз', 'Майкелти Уильямсон', 'Салли Филд', 'Ребекка Уильямс'], 'content' => 'От лица главного героя Форреста Гампа, слабоумного безобидного человека с благородным и открытым сердцем, рассказывается история его необыкновенной жизни. Фантастическим образом превращается он в известного футболиста, героя войны, преуспевающего бизнесмена. Он становится миллиардером, но остается таким же бесхитростным, глупым и добрым. Форреста ждет постоянный успех во всем, а он любит девочку, с которой дружил в детстве, но взаимность приходит слишком поздно.']
	];

	foreach($films as $film){
		$title = $film['name'];
		if(empty ($title)) continue;
		$args = [wp_unslash(sanitize_post_field('post_type', 'movies', 0, 'db')),wp_unslash(sanitize_post_field('post_title', $title, 0, 'db'))];
		if((int)$wpdb->get_var($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE post_type = %s AND post_title = %s", $args))) continue;
		$postarr = [
			'post_type'      => 'movies',
			'post_title'     => $film['name'],
			'post_content'   => $film['content'],
			'comment_status' => 'open',
			'post_status'    => 'publish',
			'meta_input'     => [
				$movies_meta_fields[0]['id'] => $film['price'],
				$movies_meta_fields[1]['id'] => $film['release']
			],
		];
		$post_id = wp_insert_post($postarr, true);
		wp_set_post_terms($post_id, $film['genres'], 'taxgenres');
		wp_set_post_terms($post_id, $film['country'], 'taxcountries');
		wp_set_post_terms($post_id, $film['year'], 'taxyears');
		wp_set_post_terms($post_id, $film['actors'], 'taxactors');
	}
}

/**
 * Convert sting to slug
 *
 * @param string $str
 *
 * @return string
 */
function toSlug($str){
	$str = strtolower(trim($str));
	$str = preg_replace('/[^a-z0-9-]/', '-', $str);
	$str = preg_replace('/-+/', "-", $str);
	rtrim($str, '-');
	return $str;
}

// fill demo data
/**
 * Function executed on plugin activation and sets the flag "Activated_Plugin"
 */
function incode_movies_plugin_activate(){
	// add option to then identify the time of activation of the plug-in in admin_init action.
	add_option('Activated_Plugin', 'Plugin-Slug');
}

register_activation_hook(INCODE_MOVIES__PLUGIN_FILE, 'incode_movies_plugin_activate');

/**
 * Function executed each time on 'admin_init' and check flag "Activated_Plugin"
 * If the flag is set, the database is populated with data
 */
function incode_movies_load_plugin(){
	if(is_admin() && get_option('Activated_Plugin') == 'Plugin-Slug'){
		//remove a previously added option
		delete_option('Activated_Plugin');
		populate_demo_data();
	}
}

add_action('admin_init', 'incode_movies_load_plugin');
