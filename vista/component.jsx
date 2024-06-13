/**
 * v0 by Vercel.
 * @see https://v0.dev/t/eKamXfmDA0x
 * Documentation: https://v0.dev/docs#integrating-generated-code-into-your-nextjs-app
 */
import Link from "next/link"
import { Button } from "@/components/ui/button"
import { Table, TableHeader, TableRow, TableHead, TableBody, TableCell } from "@/components/ui/table"
import { Badge } from "@/components/ui/badge"

export default function Component() {
  return (
    <div className="grid grid-cols-[280px_1fr] min-h-screen w-full">
      <div className="bg-[#87CEEB] text-white flex flex-col gap-2">
        <div className="sticky top-0 p-2">
          <Link href="#" className="flex items-center gap-2" prefetch={false}>
            <FileIcon className="h-6 w-6" />
            <span className="font-bold text-lg">Actas</span>
          </Link>
        </div>
        <div className="overflow-auto flex-1">
          <nav className="grid gap-2 p-4">
            <Link href="#" className="hover:bg-[#6aa8d1] px-4 py-2 rounded transition-colors" prefetch={false}>
              Ver Actas
            </Link>
            <Link href="#" className="hover:bg-[#6aa8d1] px-4 py-2 rounded transition-colors" prefetch={false}>
              Crear Acta
            </Link>
            <Link href="#" className="hover:bg-[#6aa8d1] px-4 py-2 rounded transition-colors" prefetch={false}>
              Editar Acta
            </Link>
            <Link href="#" className="hover:bg-[#6aa8d1] px-4 py-2 rounded transition-colors" prefetch={false}>
              Archivar Acta
            </Link>
          </nav>
        </div>
      </div>
      <div className="flex flex-col">
        <header className="bg-[#87CEEB] text-white py-4 px-6 flex items-center justify-between">
          <div className="flex items-center gap-4">
            <Link href="#" className="flex items-center gap-2" prefetch={false}>
              <FileIcon className="h-6 w-6" />
              <span className="font-bold text-lg">Actas</span>
            </Link>
          </div>
          <Button variant="outline" size="icon" className="md:hidden">
            <MenuIcon className="h-6 w-6" />
            <span className="sr-only">Toggle navigation</span>
          </Button>
        </header>
        <main className="flex-1 py-8 px-4 md:px-8">
          <div className="max-w-4xl mx-auto">
            <div className="mb-6">
              <h1 className="text-3xl font-bold">Actas</h1>
              <p className="text-[#87CEEB]">Aquí puedes ver, crear, editar y archivar actas.</p>
            </div>
            <div className="bg-white shadow-md rounded-lg overflow-hidden">
              <Table>
                <TableHeader>
                  <TableRow>
                    <TableHead>Fecha</TableHead>
                    <TableHead>Título</TableHead>
                    <TableHead>Estado</TableHead>
                    <TableHead />
                  </TableRow>
                </TableHeader>
                <TableBody>
                  <TableRow>
                    <TableCell>2023-05-15</TableCell>
                    <TableCell>Reunión Trimestral</TableCell>
                    <TableCell>
                      <Badge variant="success">Aprobada</Badge>
                    </TableCell>
                    <TableCell>
                      <Link href="#" className="text-[#87CEEB] hover:underline" prefetch={false}>
                        Ver Detalles
                      </Link>
                    </TableCell>
                  </TableRow>
                  <TableRow>
                    <TableCell>2023-04-20</TableCell>
                    <TableCell>Planificación Anual</TableCell>
                    <TableCell>
                      <Badge variant="warning">Pendiente</Badge>
                    </TableCell>
                    <TableCell>
                      <Link href="#" className="text-[#87CEEB] hover:underline" prefetch={false}>
                        Ver Detalles
                      </Link>
                    </TableCell>
                  </TableRow>
                  <TableRow>
                    <TableCell>2023-03-10</TableCell>
                    <TableCell>Revisión de Objetivos</TableCell>
                    <TableCell>
                      <Badge variant="danger">Archivada</Badge>
                    </TableCell>
                    <TableCell>
                      <Link href="#" className="text-[#87CEEB] hover:underline" prefetch={false}>
                        Ver Detalles
                      </Link>
                    </TableCell>
                  </TableRow>
                </TableBody>
              </Table>
            </div>
          </div>
        </main>
        <footer className="bg-[#87CEEB] text-white py-4 px-6 text-center">
          <p>&copy; 2023 Actas. Todos los derechos reservados.</p>
        </footer>
      </div>
    </div>
  )
}

function FileIcon(props) {
  return (
    <svg
      {...props}
      xmlns="http://www.w3.org/2000/svg"
      width="24"
      height="24"
      viewBox="0 0 24 24"
      fill="none"
      stroke="currentColor"
      strokeWidth="2"
      strokeLinecap="round"
      strokeLinejoin="round"
    >
      <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z" />
      <path d="M14 2v4a2 2 0 0 0 2 2h4" />
    </svg>
  )
}


function MenuIcon(props) {
  return (
    <svg
      {...props}
      xmlns="http://www.w3.org/2000/svg"
      width="24"
      height="24"
      viewBox="0 0 24 24"
      fill="none"
      stroke="currentColor"
      strokeWidth="2"
      strokeLinecap="round"
      strokeLinejoin="round"
    >
      <line x1="4" x2="20" y1="12" y2="12" />
      <line x1="4" x2="20" y1="6" y2="6" />
      <line x1="4" x2="20" y1="18" y2="18" />
    </svg>
  )
}