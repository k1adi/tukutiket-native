BEGIN
 DECLARE id_g INTEGER;
 SET id_g = SELECT id_gerbong
    FROM `pesan_kereta`
    INNER JOIN `penumpang` ON pesan_kereta.nik = penumpang.nik
    INNER JOIN `jadwal_kereta` ON pesan_kereta.id_jadwal = jadwal_kereta.id_jadwal
    INNER JOIN `kereta` ON jadwal_kereta.id_kereta = kereta.id_kereta
    INNER JOIN `gerbong` ON kereta.id_kereta = gerbong.id_kereta
   	WHERE penumpang.nik = NEW.nik;
 UPDATE `gerbong` SET jml_kursi = jml_kursi-NEW.jml_pesan
 WHERE id_gerbong = id_g;
 END