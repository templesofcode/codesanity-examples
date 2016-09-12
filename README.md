# codesanity-examples
Scripts that demonstrate the usage of the codesanity library. The directories (relative to this root project)

    examples/originals/source
    examples/originals/target

Are the original sources of truth relative to the examples; these two directories should be similar in content and structure.  
They are used as bases, then altered for the specific examples.

The examples were executed in a VM controlled by [vagrant](https://www.vagrantup.com/).

## examples/example1/NoDiffs.php

tests **_examples/example1/target_** against **_examples/example1/source_**.  
There should be no differences compared to each other, as printed out in the output, both in pretty and csv format.  
Note: no content has changed for source and target relative to the originals.

    $ php examples/example1/NoDiffs.php
    ---------------------------------------------------------------------------------------------------------------------------------------------------------
    | Source of truth Location       | Source of truth File Hash                | Target Location                | Target File Hash                         |
    ---------------------------------------------------------------------------------------------------------------------------------------------------------
    ---------------------------------------------------------------------------------------------------------------------------------------------------------
    
    Source of truth Location,Source of truth File Hash,Target Location,Target File Hash

## examples/example2/Diff.php

tests **_examples/example2/target_** against **_examples/example2/source_**.  
There should be one difference between each other, as printed in the output, both in pretty and csv format.  
Note: _examples/example2/source/b_ content has changed compared to _examples/originals/source/b_  
Check by running the following in the command line (bash) `$ cat examples/originals/source/b examples/example2/source/b examples/example2/target/b`


    $ php examples/example2/Diff.php
    -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    | Source of truth Location                                | Source of truth File Hash                | Target Location                                         | Target File Hash                         |
    -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    | /vagrant/codesanity-examples/examples/example2/source/b | cde17827878712e37dbc1d32272f736258c06cc4 | /vagrant/codesanity-examples/examples/example2/target/b | 51b647dee86ebf0ba711a3949cdd99ccb6e6d39d |
    -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    Source of truth Location,Source of truth File Hash,Target Location,Target File Hash
    /vagrant/codesanity-examples/examples/example2/source/b,cde17827878712e37dbc1d32272f736258c06cc4,/vagrant/codesanity-examples/examples/example2/target/b,51b647dee86ebf0ba711a3949cdd99ccb6e6d39d



## examples/example3/Diff.php

tests **_examples/example3/target_** against **_examples/example3/source_**.  
There should be one difference between each other, as printed in the output, both in pretty and csv format.  
Note: _examples/example3/target/c_ content has changed compared to _examples/originals/target/c_  
Check by running `$ cat examples/originals/source/c examples/originals/target/c examples/example3/source/c examples/example3/target/c`

    $ php examples/example3/Diff.php
    -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    | Source of truth Location                                | Source of truth File Hash                | Target Location                                         | Target File Hash                         |
    -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    | /vagrant/codesanity-examples/examples/example3/source/c | ea87f1a0e7ce01fab180b25fef802b4137e5fa0f | /vagrant/codesanity-examples/examples/example3/target/c | 1a82deab4468fb67d914f12d113cec52abeef708 |
    -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    Source of truth Location,Source of truth File Hash,Target Location,Target File Hash
    /vagrant/codesanity-examples/examples/example3/source/c,ea87f1a0e7ce01fab180b25fef802b4137e5fa0f,/vagrant/codesanity-examples/examples/example3/target/c,1a82deab4468fb67d914f12d113cec52abeef708


## examples/example4/NoDiffs.php

tests **_examples/example4/source_** with remote directory **_remoUser@remoteHost:/tmp/target_**.  
There should be no difference, as printed in the output, both in pretty and csv format.  
This script asssumes that the proper options are provided to the remote connection and that authorized keys are being  
used to allow the user to connect to the remote host without using a password.  
Note: The remote directory _/tmp/target_ has no content or structure changes compared to _examples/example4/target_ 
    
    $ php examples/example4/NoDiffs.php
    ---------------------------------------------------------------------------------------------------------------------------------------------------------
    | Source of truth Location       | Source of truth File Hash                | Target Location                | Target File Hash                         |
    ---------------------------------------------------------------------------------------------------------------------------------------------------------
    ---------------------------------------------------------------------------------------------------------------------------------------------------------
    
    Source of truth Location,Source of truth File Hash,Target Location,Target File Hash
    
## examples/example5/Diff.php and examples/example5/Diff2.php

tests **_examples/example5/source_** with the remote directory **_remoteUser@remoteHost:/tmp/target_**.
There should be one difference between each other, as printed in the output, both in pretty and csv format.
Note: _examples/example5/source/b_ content has changed compared to _examples/originals/source/b_
Check by running `$ cat examples/originals/source/b examples/example5/source/b examples/example5/target/b`

    $ php examples/example5/Diff.php
    -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    | Source of truth Location                                | Source of truth File Hash                | Target Location                                         | Target File Hash                         |
    -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    | /vagrant/codesanity-examples/examples/example5/source/b | cde17827878712e37dbc1d32272f736258c06cc4 | mut4nt@192.168.33.10:/tmp/target2/b                     | 51b647dee86ebf0ba711a3949cdd99ccb6e6d39d |
    -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    Source of truth Location,Source of truth File Hash,Target Location,Target File Hash
    /vagrant/codesanity-examples/examples/example5/source/b,cde17827878712e37dbc1d32272f736258c06cc4,remoteUser@remoteHost:/tmp/target2/b,51b647dee86ebf0ba711a3949cdd99ccb6e6d39d    




    $ php examples/example5/Diff2.php 
    -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    | Source of truth Location                                | Source of truth File Hash                | Target Location                                         | Target File Hash                         |
    -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    | /vagrant/codesanity-examples/examples/example5/source/b | cde17827878712e37dbc1d32272f736258c06cc4 | mut4nt@192.168.33.10:/tmp/target2/b                     | 51b647dee86ebf0ba711a3949cdd99ccb6e6d39d |
    -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    Source of truth Location,Source of truth File Hash,Target Location,Target File Hash
    /vagrant/codesanity-examples/examples/example5/source/b,cde17827878712e37dbc1d32272f736258c06cc4,remoteUser@remoteHost:/tmp/target2/,51b647dee86ebf0ba711a3949cdd99ccb6e6d39d


