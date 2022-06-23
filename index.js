import crystaljson from './json.php' assert {type: 'json'};

const tableselector = document.querySelector('.crystaltable');

const names = [];
const heights = [];
const dobs = [];
const interests = [];
const hobbies = [];

crystaljson.forEach(function (profile) {
    names.push(`${profile.name}`);
    heights.push(`${profile.height}`);
    dobs.push(`${profile.dob}`);
    interests.push(`${profile.interests}`);
    hobbies.push(`${profile.hobby}`);
});

sorta(tableselector, {
    NAME : names,
    HEIGHT : heights,
    DOB : dobs,
    INTERESTS : interests,
    HOBBIES : hobbies
});