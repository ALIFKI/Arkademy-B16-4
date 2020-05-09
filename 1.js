function biodata(nama,umur){
    var bio = {
        'nama'  : nama,
        'age'   : umur,
        'address' : 'Timbang,Leksono,Wonosobo',
        'hobbies' : ['eat','sleep','breath'],
        'is_married'  : false,
        'list_school' : [{
            'Name' : 'SD Negeri Timbang',
            "Year In" : 2008,
            "Year Out" : 2014,
            'Major' : null
        },
        {
            'Name' : 'SMP Negeri 3 Leksono',
            'Year In' : 2014,
            'Year Out' : 2017,
            'Major' : null
        },
        {
            'Name' : 'SD Negeri 1 Wonosobo',
            'Year In' : 2017,
            'Year Out' : 2020,
            'Major' : "Rekayasa Perangkat Lunak"
        }],
        'skills' : [
            {'Skill_name' : 'PHP',
            'Level' : 'Beginner'},
            {'Skill_name' : 'JavaScript',
             'Level' : 'Beginner'}
        ],
        'intersting_in_coding' : true
    }
    return bio;
}

console.log(biodata('ALIFKHI MIFTAHUL JANAH',18))