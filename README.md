# wordpress
To-dos / Probleme:
1. Seitenquelltext zeigt als Link mein Stylesheet frontend_testimonials.css an, ist aber nicht aktiv,
    deshalb temporär internes Stylesheet in testimonials_template.php eingefügt
2. Wie können Filtertags im Front-end abgebildet werden?
  * versucht, Shortcode-Funktion zu implementieren
  * in der Funktion register_tanonomy() jeweils Argumente mit dem Wert 'true' hinzugefügt ('public', 'publicly queryable', 'show_ui',          'show_in_nav_menus'), wobei das eigentlich nicht notwendig sein sollte, da default jeweils 'true'
