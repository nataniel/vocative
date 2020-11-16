<?php
namespace Nataniel;

class Vocative
{
    const RULES = [
        'a' => [
            'świnia' => 'świnio',
            'śka' => 'śko',
            'sia' => 'siu',
            'zia' => 'ziu',
            'cia' => 'ciu',
            'nia' => 'niu',
            'aja' => 'aju',
            'lla' => 'llo',
            'ila' => 'ilo',
            'ula' => 'ulo',
            'nela' => 'nelo',
            'bela' => 'belo',
            'iela' => 'ielo',
            'mela' => 'melo',
            'la' => 'lu',
            'a' => 'o',
        ],
        'b' => [
            'b' => 'bie',
        ],
        'c' => [
            'ojciec' => 'ojcze',
            'starzec' => 'starcze',
            'ciec' => 'ćcu',
            'liec' => 'łcu',
            'niec' => 'ńcu',
            'siec' => 'ścu',
            'ziec' => 'źcu',
            'lec' => 'lcu',
            'c' => 'cu',
        ],
        'ć' => [
            'gość' => 'gościu',
            'ść' => 'ściu',
            'ć' => 'cio',
        ],
        'd' => [
            'łąd' => 'łędzie',
            'ód' => 'odzie',
            'd' => 'dzie',
        ],
        'f' => [
            'f' => 'fie',
        ],
        'g' => [
            'bóg' => 'boże',
            'g' => 'gu',
        ],
        'h' => [
            'ph' => 'ph',
            'h' => 'hu',
        ],
        'j' => [
            'ój' => 'oju',
            'j' => 'ju',
        ],
        'k' => [
            'człek' => 'człeku',
            'ciek' => 'ćku',
            'liek' => 'łku',
            'niek' => 'ńku',
            'siek' => 'śku',
            'ziek' => 'źku',
            'wiek' => 'wieku',
            'ek' => 'ku',
            'k' => 'ku',
        ],
        'l' => [
            'kornel' => 'kornelu',
            'sól' => 'solo',
            'mól' => 'mole',
            'awel' => 'awle',
            'al' => 'ale', // Michal -> Michale
            'l' => 'lu',
        ],
        'ł' => [
            'zioł' => 'źle',
            'ół' => 'ole',
            'eł' => 'le',
            'ł' => 'le',
        ],
        'm' => [
            'miriam' => 'miriam',
            'm' => 'mie',
        ],
        'n' => [
            'nikola' => 'nikolo',
            'syn' => 'synu',
            'n' => 'nie',
        ],
        'ń' => [
            'skroń' => 'skronio',
            'dzień' => 'dniu',
            'czeń' => 'czniu',
            'ń' => 'niu',
        ],
        'p' => [
            'p' => 'pie',
        ],
        'r' => [
            'per' => 'prze',
            'ór' => 'orze',
            'r' => 'rze',
        ],
        's' => [
            'ines' => 'ines',
            'ies' => 'sie',
            's' => 'sie',
        ],
        'ś' => [
            'gęś' => 'gęsio',
            'ś' => 'siu',
        ],
        't' => [
            'st' => 'ście',
            't' => 'cie',
        ],
        'w' => [
            'konew' => 'konwio',
            'sław' => 'sławie',
            'lew' => 'lwie',
            'łw' => 'łwiu',
            'ów' => 'owie',
            'w' => 'wie',
        ],
        'x' => [
            'x' => 'ksie',
        ],
        'z' => [
            'ksiądz' => 'księże',
            'dz' => 'dzu',
            'cz' => 'czu',
            'rz' => 'rzu',
            'sz' => 'szu',
            'óz' => 'ozie',
            'z' => 'zie',
        ],
        'ż' => [
            'ąż' => 'ężu',
            'ż' => 'żu',
        ],
    ];
    
    public function invoke($name): string
    {
        $firstname = $this->getFirstname($name);
        $branch = $this->findBranch($firstname);
        $vocative = $this->findUsingBranch($firstname, $branch);
        return $this->ucFirst($vocative);
    }

    private function getFirstname($name): string
    {
        return trim(mb_strtolower(strtok($name, ' ')));
    }

    private function findUsingBranch(string $firstname, array $branch): string
    {
        while ($suffix = current($branch)) {
            if (preg_match('/(.*)' . key($branch) . '$/u', $firstname, $reg)) {
                return $reg[1] . $suffix;
            }

            next($branch);
        }

        return $firstname;
    }

    private function ucFirst($firstname): string
    {
        $firstLetter = mb_substr($firstname, 0, 1);
        return mb_strtoupper($firstLetter) . mb_substr($firstname, 1);
    }

    private function findBranch($firstname): array
    {
        $lastCharacter = mb_substr($firstname, -1);
        return isset(self::RULES[ $lastCharacter ])
            ? self::RULES[ $lastCharacter ]
            : [];
    }
}