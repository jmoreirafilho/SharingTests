## SharingTests ##
### Descrição ###
- Aplicação pública de envio/exibição de arquivos de texto

### Funcionalidades ###
- Cadastro de professores
 - CRUD
 - O professor deverá ser cadastrado a partir de um `cadastro/upload de material`
 - Deve ser cadastrado o nome do professor

- Cadastro de instituições
 - CRUD
 - A instituição deverá ser cadastrada a partir de um `cadastro/upload de material`
 - Deve ser cadastrado o nome da instituição

- Cadastro de cursos
 - CRUD
 - O curso deverá ser cadastrado a partir de um `cadastro/upload de material`
 - Deve ser cadastrado o nome do curso
 
- Cadastro/Upload de material
 - CRUD
 - Deve listar os professores e as insituições, mas também dar opção de cadastrar novos (typeahead)

### Esquema ###
Um usuário, ao fazer o upload do material, deve declarar o nome do curso, o nome do professor, a data e a instituição de ensino desse material, além de um titulo para o arquivo. Com essas informações é possivel fazer o upload do material para o sistema e deixa-lo acessivel para outros usuários. O responsável pela publicação do material pode setar outras informações para que fique mais fácil filtrar/buscar outros materias, como Cidade, Estado, etc...

Um usuário, ao buscar algum material deve selecionar, primeiramente, o curso desejado, Depois disso, poderá selecionar OU o professor OU a instituição e a partir disso terá todos os materiais filtrados, ordenados pela data.
