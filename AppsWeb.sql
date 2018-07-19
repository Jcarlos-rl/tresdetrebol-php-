CREATE SCHEMA IF NOT EXISTS `3deTrebol` DEFAULT CHARACTER SET utf8 ;
USE `3deTrebol` ;

CREATE TABLE IF NOT EXISTS `3deTrebol`.`User` (
  `idUser` INT NOT NULL AUTO_INCREMENT,
  `nombreUsuario` VARCHAR(45) NOT NULL,
  `password` VARCHAR(50) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `is_admin` boolean NOT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE INDEX `nombreUsuario_UNIQUE` (`nombreUsuario` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `3deTrebol`.`Productos` (
  `idProductos` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `stock` INT NOT NULL,
  `categoria` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(800) NOT NULL,
  `precio` FLOAT NOT NULL,
  `marca` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idProductos`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `3deTrebol`.`orden` (
  `idorden` INT NOT NULL AUTO_INCREMENT,
  `userId` INT NOT NULL,
  `forma_de_pago` VARCHAR(45) NOT NULL,
  `fecha` DATE NOT NULL,
  `total` VARCHAR(45) NOT NULL,
  `User_idUser` INT NOT NULL,
  PRIMARY KEY (`idorden`, `User_idUser`),
  INDEX `fk_orden_User_idx` (`User_idUser` ASC),
  CONSTRAINT `fk_orden_User`
    FOREIGN KEY (`User_idUser`)
    REFERENCES `3deTrebol`.`User` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `3deTrebol`.`order_item` (
  `idorder_item` INT NOT NULL AUTO_INCREMENT,
  `orderId` INT NOT NULL,
  `productId` INT NOT NULL,
  `cantidad` INT NOT NULL,
  `orden_idorden` INT NOT NULL,
  `orden_User_idUser` INT NOT NULL,
  `Productos_idProductos` INT NOT NULL,
  PRIMARY KEY (`idorder_item`, `orden_idorden`, `orden_User_idUser`, `Productos_idProductos`),
  INDEX `fk_order_item_orden1_idx` (`orden_idorden` ASC, `orden_User_idUser` ASC),
  INDEX `fk_order_item_Productos1_idx` (`Productos_idProductos` ASC),
  CONSTRAINT `fk_order_item_orden1`
    FOREIGN KEY (`orden_idorden` , `orden_User_idUser`)
    REFERENCES `3deTrebol`.`orden` (`idorden` , `User_idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_order_item_Productos1`
    FOREIGN KEY (`Productos_idProductos`)
    REFERENCES `3deTrebol`.`Productos` (`idProductos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `3deTrebol`.`direccion` (
  `iddireccion` INT NOT NULL AUTO_INCREMENT,
  `calle` VARCHAR(45) NOT NULL,
  `numero` VARCHAR(45) NOT NULL,
  `codigo_postal` INT NOT NULL,
  `telefono` VARCHAR(45) NOT NULL,
  `User_idUser` INT NOT NULL,
  PRIMARY KEY (`iddireccion`, `User_idUser`),
  INDEX `fk_direccion_User1_idx` (`User_idUser` ASC),
  CONSTRAINT `fk_direccion_User1`
    FOREIGN KEY (`User_idUser`)
    REFERENCES `3deTrebol`.`User` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


insert into Productos(nombre,stock, categoria, descripcion,precio, marca) values("Memento Mori", 10,"Playing Cards", "Partiendo de la teoría latina medieval y la práctica de la reflexión sobre la mortalidad, ha sido una parte omnipresente de la cultura humana durante siglos. Desde lo filosófico hasta lo artístico, la fascinación, el miedo y la apreciación de la muerte han cautivado y cultivado constantemente nuestra imaginación. Muchos practicantes de esta teoría se quedaron con ellos, artefactos o recuerdos que servían como un recordatorio de que lo único seguro en la vida era la muerte. Muchos de estos artículos eran a menudo objetos (relojes, collares) en forma de calaveras.", 150.00,"Murphy's Magic");
insert into Productos(nombre,stock, categoria, descripcion,precio, marca) values("Virtuoso", 10,"Playing Cards", "Los nuevos fragmentos, que complementan el diseño posterior de la plataforma de borde a borde, permiten patrones fluidos pero medidos, creando un bello equilibrio entre la uniformidad y la separación cuando se separan las tarjetas. Básicamente, tus fans se ven al instante más grandes, más audaces y mejores. Las cartas incluso parecen cambiar de color según la dirección en que las abanique, y forman patrones diferentes según la cantidad de cartas que use. ", 250.00,"Murphy's Magic");
insert into Productos(nombre,stock, categoria, descripcion,precio, marca) values("Truth and Lies", 10,"Playing Cards", "Una mentira contada con suficiente frecuencia se convierte en la verdad. \nPlaying and Lies Playing Cards  representa la naturaleza dual del engaño y la honestidad. Son dos caras de la misma moneda, ambas entrelazadas profundamente dentro de cada truco de magia. Un desfile de mentiras adornadas es lo que los espectadores son obligados a ver, mientras que la verdad desnuda y sin adornos se ignora y a menudo se oculta a la vista.", 150.00,"Murphy's Magic");
insert into Productos(nombre,stock, categoria, descripcion,precio, marca) values("Skull", 10,"Playing Cards", "Este diseño fue tomado de una placa histórica en los archivos de la marca Bicycle®, y luego se actualizó para el siglo XXI. El diseño posterior es en blanco y negro, aunque mantuvimos los cuatro colores estándar en la parte posterior de la plataforma. Perfecto para piratas, villanos o cualquiera cuyo vestuario esté lleno de negro.", 120.00,"Bicycle");
insert into Productos(nombre,stock, categoria, descripcion,precio, marca) values("Pluma", 10,"Playing Cards", "The Pluma Deck presenta una combinación de imágenes tribales y aviares, y es una versión actualizada de una placa histórica en los archivos de Bicycle®. Los colores azul y marrón se juegan el uno al otro en alusión a la tierra y el cielo.", 120.00,"Bicycle");
insert into Productos(nombre,stock, categoria, descripcion,precio, marca) values("Bone Riders", 10,"Playing Cards", "A los niños les encantará el gato de las linternas, los murciélagos y los esqueletos que bailan en la parte posterior de las cartas. Los adultos apreciarán el divertido efecto de Halloween en el diseño clásico de Bicycle Rider Back. Ilustraciones adictivas y adictivas adornan el comodín y el as de espadas para hacer de este mazo una fiesta memorable o una forma festiva de celebrar la temporada en tu próximo juego de cartas. ", 180.00,"Bicycle");
insert into Productos(nombre,stock, categoria, descripcion,precio, marca) values("Dragon Back", 10,"Playing Cards", "El diseño del dragón se encontró en los archivos de la United States Playing Company, fabricantes de tarjetas Bicycle durante más de 125 años. Se volvió a poner en producción recientemente y se ha convertido en uno de sus diseños más populares. Las intrincadas celosías y el tema asiático hacen estos regalos particularmente hermosos en este año del dragón. ", 95.00,"Bicycle");
insert into Productos(nombre,stock, categoria, descripcion,precio, marca) values("Bicycle Dragonlord", 10,"Playing Cards", "El diseño original de TCC y Sam se basa en la tradición de la cultura china: el Dragón. Este tema, complementado por su estilo moderno y diseño intrincado, se materializa incisivamente y vívidamente en la caja de la tarjeta. Las tarjetas están dominadas por moteados en blanco y negro, que representan la larga historia y la precipitación del viento y las heladas, así como el significado de la bendición.", 210.00,"Bicycle");
insert into Productos(nombre,stock, categoria, descripcion,precio, marca) values("Monarchs", 10,"Playing Cards", "Monarch Playing Cards expresan elegancia, claridad y orgullo. Simplificado pero elegante. Como un Rolls Royce. En pocas palabras, Monarchs define la excelencia. Hemos sido pioneros en nuevas y fascinantes formas de superar los límites y elevar el estándar. Utilizamos papel importado y pesado para una sensación suave y una composición robusta. La lámina rodea el diseño de la caja para obtener el máximo detalle e impacto visual.", 190.00,"Theory 11");
insert into Productos(nombre,stock, categoria, descripcion,precio, marca) values("Artisans", 10,"Playing Cards", "Ilustrado a mano en Sudáfrica, los artesanos están en una liga propia. Una mezcla impresionante de elegancia, estilo y sofisticación.\nDiseñadas por Simon Frouws, estas naipes de lujo premium cuentan con elegantes láminas de oro estampadas en papel negro ultra-lux derivado de bosques sostenibles.", 190.00,"Theory 11");
insert into Productos(nombre,stock, categoria, descripcion,precio, marca) values("Mailchimp", 10,"Playing Cards", "MailChimp significa creatividad y pensamiento comercial serio fuera de la caja con propósito y corazón. Queríamos producir una baraja de cartas que refleje esta perspectiva en un diseño simple, divertido y elegante.\nLas cartas de juego de MailChimp son una combinación perfecta de elementos orgánicos e imágenes icónicas, con tarjetas de corte personalizadas y bordes ultra finos. ", 190.00,"Theory 11");
insert into Productos(nombre,stock, categoria, descripcion,precio, marca) values("NPH", 10,"Playing Cards", "Las naipes de NPH son elegantes, intrincadas y visualmente deslumbrantes. Todos los aspectos fueron hechos a mano con una atención al detalle implacable e inigualable. \n Al igual que con todo, hay más de lo que parece: simbolismo secreto dentro del mazo. Mire de cerca y puede descubrir mucho más.", 190.00,"Theory 11");
insert into Productos(nombre,stock, categoria, descripcion,precio, marca) values("Tycoon", 10,"Playing Cards", "El lujo no tiene límites\nCartas de diseñador de primera calidad producidas en colaboración con Steve Cohen, protagonista de Chamber Magic, un destacado programa en el prestigioso Hotel Waldorf Astoria en la ciudad de Nueva York.", 190.00,"Theory 11");
insert into Productos(nombre,stock, categoria, descripcion,precio, marca) values("Medallions", 10,"Playing Cards", "Toque. Sensación. Imagina. Descubrir. Medallion Playing Cards. \nLa versión original fue favorita de los fanáticos. Esta nueva edición ahora está disponible con relieve mejorado. Una mezcla de pura elegancia y sorprendente belleza. Un objeto atemporal infundido con el lujo supremo de la época victoriana. Después de 18 meses de descubrimiento, desenterramos la receta perfecta. Estamos orgullosos de anunciar nuestro tesoro más nuevo: medallones.", 190.00,"Theory 11");
insert into Productos(nombre,stock, categoria, descripcion,precio, marca) values("Union", 10,"Playing Cards", "Los naipes de la Unión están llenos de imágenes de la revolución estadounidense, con un mensaje de libertad, esperanza e independencia.\nTimeless Americana está entrelazada en todo el diseño, con la iconografía de la América colonial y símbolos patrióticos de paz, prosperidad y potencial. ", 190.00,"Theory 11");
insert into Productos(nombre,stock, categoria, descripcion,precio, marca) values("Knights", 10,"Playing Cards", " KNIGHTS presenta obras de arte totalmente personalizadas de Oban Jones , desde el icónico Ace of Spades, los llamativos Jokers hasta las tarjetas y rostros personalizados de las tarjetas de la corte. \nAlgunas sorpresas se encuentran dentro de la sencilla y clásica mata de oro blanco e impactante. Estas características ocultas incorporan la estética y la practicidad que atraen tanto a magos, jugadores y jugadores de ajedrez.", 200.00,"Ellusionist");
insert into Productos(nombre,stock, categoria, descripcion,precio, marca) values("Madison Dealers", 10,"Playing Cards", "Tal como se usó en 1902, estas cartas de juego utilizan un diseño de casa de juegos de azar sin márgenes borde a borde. Si le preocupan los ascensores dobles, etc., tal vez es hora de dejar de depender de las fronteras blancas para ocultar ineficiencias. Estas tarjetas te ayudarán a ser bueno en lo que haces.", 140.00,"Ellusionist");
insert into Productos(nombre,stock, categoria, descripcion,precio, marca) values("Keepers", 10,"Playing Cards", "Los guardianes son el faro y salvador de su trabajo con cartas. Concebidos por Adam Wilber y traídos a tierra por Oban Jones, los Guardianes son posiblemente los corredores del futuro. Un diseño bellamente clásico que se mantiene en silencio mientras tu magia habla.", 140.00,"Ellusionist");
insert into Productos(nombre,stock, categoria, descripcion,precio, marca) values("Gold Revolvers", 10,"Playing Cards", "Los Revólveres de Madison vuelven con GOLD FOIL. Las cartas brillan y brillan brillantemente a la luz, dando a esta cubierta una presencia innegable. Una baraja que se destaca como ninguna otra.", 300.00,"Ellusionist");
insert into Productos(nombre,stock, categoria, descripcion,precio, marca) values("Killer Bee", 10,"Playing Cards", "Killer Bees es el híbrido mutante de tímidas abejas europeas y sus primos africanos.  Al igual que todas las historias de superhéroes, los científicos asesinos introdujeron a los Asesinos en Brasil para ayudarles a repoblar su decreciente población de abejas.", 170.00,"Ellusionist");