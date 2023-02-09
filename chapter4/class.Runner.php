<?php
class Runner
{
    public static function init() {

        try {
            $file = fopen("/log.txt", "a");
            fwrite($file, "Start: \n");

            $config = new Config(__DIR__ . "/config.xml");
            echo "user: {$config->get('user')}\n";
            echo "host: {$config->get('host')}\n";
            $config->set("password", "anotherpassword");
            $config->write();
            fwrite($file, "end\n");
            fclose($file);
        } catch (FileException $e) {
            fwrite($file, "File Error\n");
            throw $e;

        } catch (XmlException $e) {
            fwrite($file, "XML Error\n");

        } catch (ConfigException $e) {
            fwrite($file, "Config Error\n");

        } catch (Exception $e) {
            fwrite($file, "Error\n");
        } finally {
            fwrite($file, "end\n");
            fclose($file);
        }
    }
}
?>