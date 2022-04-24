export class Indicado {
  id: string;
  nome: string;
  cpf: string;
  telefone: string;
  email: string;
  status_indicacao: number;

  constructor(
    nome: string,
    id: string,
    cpf: string,
    telefone: string,
    status_indicacao: number,
    email: string
  ) {
    this.id = id;
    this.nome = nome;
    this.cpf = cpf;
    this.telefone = telefone;
    this.email = email;
    this.status_indicacao = status_indicacao;
  }
}
