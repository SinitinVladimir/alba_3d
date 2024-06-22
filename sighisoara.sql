INSERT INTO locations (
    title, catch_phrase, description, short_description, ticket_price, 
    visiting_hours, more_info_link, map_link, social_media_facebook, 
    nearest_coffee, taxi_link, location_coordinates, location_camera_type,
    social_media_instagram, social_media_youtube, social_media_website, 
    social_media_tiktok, social_media_x, expiration_date, updated_at
)
VALUES
    (
        'Casa Vlad Dracul',
        'Acasă la Dracula',
        'Locul de naștere al lui Vlad Țepeș, cunoscut și ca Dracula, casa oferă o privire în trecutul legendar al voievodului.',
        NULL,
        '20 RON pentru adulți, 10 RON pentru studenți și pensionari',
        'Luni - Duminică: 10:00 - 24:00',
        'https://www.facebook.com/profile.php?id=100070747482579',
        'https://www.google.com/maps/place/Casa+Vlad+Dracul,+Sighișoara+545400/@46.2195084,24.791775,18.25z/data=!4m6!3m5!1s0x474b75c8995b71bf:0xe54d560356eb8e53!8m2!3d46.2195446!4d24.7928527!16s%2Fg%2F11bwd2mh74?entry=ttu',
        'Restaurant Casa Vlad Dracul',
        'https://www.google.com/maps/place/Vlad+Dracul+Restaurant/@46.2195367,24.7928367,21z/data=!4m15!1m8!3m7!1s0x474b75c8995b71bf:0xe54d560356eb8e53!2sCasa+Vlad+Dracul,+Sighișoara+545400!3b1!8m2!3d46.2195446!4d24.7928527!16s%2Fg%2F11bwd2mh74!3m5!1s0x474b75c8995f5e53:0xbc27a56268841291!8m2!3d46.2195392!4d24.792935!16s%2Fg%2F1hhj8ftp7?entry=ttu',
        '46.2195084,24.791775',
        NULL,
        NULL, NULL, NULL, NULL, NULL, NULL, NULL, CURRENT_TIMESTAMP
    ),
    (
        'Turnul Cizmarilor',
        'Păstrătorul tradițiilor meșteșugărești',
        'Turnul Cizmarilor, unul dintre turnurile de apărare ale cetății, este cunoscut pentru arhitectura sa robustă și pentru rolul său în protejarea orașului.',
        NULL,
        'Gratuit',
        'Deschis tot timpul',
        'https://www.facebook.com/pages/Turnul-Cizmarilor/151101402373911',
        'https://www.google.com/maps/place/Turnul+Cizmarilor,+Strada+Zidul+Cetăţii,+Sighișoara+545400/@46.2196816,24.7896194,17z/data=!4m6!3m5!1s0x474b75c7c81570b5:0x50e67606e0bf4f26!8m2!3d46.2212776!4d24.7919851!16s%2Fg%2F123382cb6?entry=ttu',
        'House on the Rock Cafe',
        'https://www.google.com/maps/place/House+on+the+Rock+Cafe/@46.220155,24.7920398,19z/data=!3m1!4b1!4m6!3m5!1s0x474b75c629975e17:0x3d42be0915bb87f0!8m2!3d46.220155!4d24.7926849!16s%2Fg%2F11hd7f012p?entry=ttu',
        '46.2196816,24.7896194',
        NULL,
        NULL, NULL, 'https://www.welcometoromania.ro/Sighisoara/Sighisoara_Turnul_Cismarilor_r.htm?fbclid=IwZXh0bgNhZW0CMTAAAR3CUZVBFtsfmxIcOfKSB78SLsUBKvegRikvwk5mdkqdmZyK7F2cXoZOi9s_aem_COOMeLDVTIFKxMsDe0YpZA', NULL, NULL, NULL, NULL, CURRENT_TIMESTAMP
    ),
    (
        'Biserica din Deal',
        'O fereastră către trecut',
        'Biserica din Deal, o minunată construcție gotică, este cel mai important loc de cult din Sighișoara.',
        NULL,
        '10 RON pentru adulți, 5 RON pentru studenți și pensionari',
        'Luni - Duminică: 10:00 - 17:00',
        'https://www.facebook.com/pages/Biserica-din-dealSighisoara/317349478359032',
        'https://www.google.com/maps/place/Biserica+din+Deal/@46.2200407,24.7906341,16.27z/data=!4m14!1m7!3m6!1s0x474b75c629975e17:0x3d42be0915bb87f0!2sHouse+on+the+Rock+Cafe!8m2!3d46.220155!4d24.7926849!16s%2Fg%2F11hd7f012p!3m5!1s0x474b75c5f6283fe9:0xd831abf911b6d5bf!8m2!3d46.2177576!4d24.7905311!16s%2Fg%2F12135qmx?entry=ttu',
        'Terasa Cafe La Scara',
        'https://www.google.com/maps/place/Terasa+Cafe+La+Scara/@46.2188941,24.788908,17z/data=!3m1!4b1!4m6!3m5!1s0x474b75c602cfa90b:0x61eab291a92be2da!8m2!3d46.2188941!4d24.7914883!16s%2Fg%2F11c54zxvcl?entry=ttu',
        '46.2200407,24.7906341',
        NULL,
        NULL, NULL, NULL, NULL, NULL, NULL, NULL, CURRENT_TIMESTAMP
    );
